<?php

namespace App\Jobs;

use App\Repo;
use App\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessGithubRepo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $_repo = null;

    /**
     * Create a new job instance.
     * @param Repo $repo
     */
    public function __construct(Repo $repo)
    {
        $this->_repo = $repo;
    }

    /**
     * Check if the path should not be counted
     *
     */

    function isBlackListed($path)
    {
        $blackList = [
            "/.git/", "/deps/", "/vendor/", "/.idea/", "png", "jpeg", "jpg", "woff", "eot", "css", "ttf", "svg",
            'mp3', "wav"
        ];

        foreach ($blackList as $entry)
            if (strpos($path, $entry) !== false)
                return true;

        return false;
    }


    /**
     * Get list of files in directory and subdirectories
     *
     */

    function getDirContents($dir, &$results = [])
    {
        $files = scandir($dir);

        foreach ($files as $key => $value) {
            $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
            if (!$this->isBlackListed($path)) {
                if (!is_dir($path)) {
                    $results[] = $path;
                } else if ($value != "." && $value != "..") {
                    $this->getDirContents($path, $results);
                }
            }
        }

        return $results;
    }


    /**
     * Count lines in a file
     *
     */

    function getLines($file)
    {
        $f     = fopen($file, 'rb');
        $lines = 0;

        while (!feof($f)) {
            $lines += substr_count(fread($f, 8192), "\n");
        }

        fclose($f);

        return $lines;
    }


    /**
     * Execute the job.
     *
     */
    public function handle()
    {
        set_time_limit(0);

        $results = [];

        exec("cd " . storage_path() . "/repos && git clone " . $this->_repo->url);

        $matches = [];
        preg_match("/\/(\d+)$/", $this->_repo->url, $matches);
        $repoName = basename($this->_repo->url);

        $filePaths = $this->getDirContents(storage_path() . "/repos/" . $repoName);

        $totalFiles = count($filePaths);
        $totalLines = 0;
        foreach ($filePaths as $path) {
            $lines      = $this->getLines($path);
            $results[]  = [
                "path"    => str_replace(storage_path() . "/repos/", "", $path),
                "lines"   => $lines,
                "repo_id" => $this->_repo->id
            ];
            $totalLines += $lines;
        }

        $this->_repo->files  = $totalFiles;
        $this->_repo->lines  = $totalLines;
        $this->_repo->status = "ready";
        $this->_repo->save();

        File::insert($results);
    }
}
