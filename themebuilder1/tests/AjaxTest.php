<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../ajax.php';

final class DummyDatabase
{
    public array $queries = [];
    public bool $nextResult = true;

    public function prefix(string $table): string
    {
        return 'prefix_' . $table;
    }

    public function query(string $sql): bool
    {
        $this->queries[] = $sql;

        return $this->nextResult;
    }
}

final class AjaxTest extends TestCase
{
    protected function setUp(): void
    {
        $_POST['action'] = '';
    }

    public function testInsertRowsBuildsInsertQuery(): void
    {
        global $xoopsDB;

        $xoopsDB = new DummyDatabase();
        $rows    = [
            ['col1' => 'val1', 'col2' => 2],
            ['col1' => 'another', 'col2' => 3],
        ];

        $result = crellyslider_wp_insert_rows($rows, 'test_table');

        $this->assertTrue($result);
        $this->assertSame(
            "INSERT INTO  prefix_test_table (col1,col2 ) VALUES ( 'val1', '2'), ( 'another', '3')",
            $xoopsDB->queries[0]
        );
    }

    public function testInsertRowsReturnsFalseOnFailure(): void
    {
        global $xoopsDB;

        $database             = new DummyDatabase();
        $database->nextResult = false;
        $xoopsDB              = $database;

        $rows = [
            ['col1' => 'value'],
        ];

        $this->assertFalse(crellyslider_wp_insert_rows($rows, 'test_table'));
    }
}
