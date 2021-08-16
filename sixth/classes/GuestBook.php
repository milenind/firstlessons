<?php
require_once 'GuestBookRecords.php';

class GuestBook
{
    /** @var string $path - путь к файлу записей книги */
    protected string $path;
    protected array $data = [];

    public function __construct($path)
    {
        $this->path = $path;

        $lines = file($this->path, FILE_IGNORE_NEW_LINES);
        foreach ($lines as $line) {
            $this->data[] = new GuestBookRecords($line);
        }

    }

    /**
     *
     * @return array
     */
    public function getRecords(): array
    {
        return $this->data;
    }

    public function append($record): void
    {
        $this->data[] = $record;
    }

    public function save()
    {
        $lines = [];
        foreach ($this->data as $record) {
            $lines[] = $record->getMessage();
        }

        file_put_contents($this->path, implode("\n", $lines));
    }
}