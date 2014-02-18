<?php namespace Flynsarmy\OrchestraCms\Tests\Unit;

use TestCase;

class HelpersTest extends TestCase
{
    public function testSortContentsByLink()
    {
        // Initial URL test
        $url = sort_contents_by_link('pages', 'title', 'asc');
        $this->assertEquals($url, resources("orchestra-cms.pages?sortBy=title&order=asc"));

        // Test content_type param
        $url = sort_contents_by_link('templates', 'title', 'asc');
        $this->assertEquals($url, resources("orchestra-cms.templates?sortBy=title&order=asc"));

        // Test sortBy param
        $url = sort_contents_by_link('pages', 'slug', 'asc');
        $this->assertEquals($url, resources("orchestra-cms.pages?sortBy=slug&order=asc"));

        // Test order param
        $url = sort_contents_by_link('pages', 'title', 'desc');
        $this->assertEquals($url, resources("orchestra-cms.pages?sortBy=title&order=desc"));

        // Test overwritten params
        $url = sort_contents_by_link('pages', 'title', 'asc', array('sortBy' => 'foo'));
        $this->assertEquals($url, resources("orchestra-cms.pages?sortBy=title&order=asc"));

        // Test extra params
        $url = sort_contents_by_link('pages', 'title', 'asc', array('foo' => 'bar'));
        $this->assertEquals($url, resources("orchestra-cms.pages?foo=bar&sortBy=title&order=asc"));
    }
}