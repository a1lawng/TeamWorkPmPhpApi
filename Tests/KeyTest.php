<?php

class KeyTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function setYourApiKey()
    {
        try {
            $project = TeamWorkPm::factory('project');
        } catch (\TeamWorkPm\Exception $e) {
            $this->assertEquals('Set your company and api key', $e->getMessage());
        }
    }
}
