<?php

class File {
    private $filename;
    private $mode;
    private $fd;

    public function __construct(string $filename, string $mode = 'r') {
        $fd = fopen($filename, $mode);
        if ($fd && $fd !== true) {
            $this->filename = $filename;
            
            $this->mode = $mode;
            $this->fd = $fd;
        } else {
            throw new Exception("[Errno 2] No such file or directory: '$filename'", 2);
        }
    }

    public function __toString(): string {
        return "File(filename={$this->filename}, mode={$this->mode})";
    }

    public function __destruct() {
        $this->close();
    }

    public static function open(string $filename, string $mode = 'r'): File {
        return new File($filename, $mode);
    }

    public function close() {
        fclose($this->fd);
    }

    public function read(int|null $bytes = null) {
        if ($bytes == null) {
            $bytes = filesize($this->filename);
        }
        if (($text = fread($this->fd, $bytes)) !== false)
            return $text;
        else
            throw new Exception("[Errno 9] Bad file descriptor", 9);
    }
}