<?php

namespace JoRo\Tests\Unit;

use JoRo\Typo3ReverseDeployment;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class Typo3ReverseDeploymentTest extends TestCase
{
    /**
     * @var Typo3ReverseDeployment
     */
    protected $subject;

    public function setUp() {
        $this->subject = new Typo3ReverseDeployment;
    }

    /**
     * @test
     */
    public function sqlExcludeTableSetterAndGetter() {
        // set value
        $testArray = ['foo', 'bar'];
        $this->subject->setSqlExcludeTable($testArray);
        // test getter
        $this->assertEquals($testArray, $this->subject->getSqlExcludeTable());
    }

    /**
     * @test
     */
    public function sqlExcludeTableAddValues() {
        // set value
        $this->subject->setSqlExcludeTable(['foo', 'bar']);
        // add and check
        $this->subject->addSqlExcludeTable(['lorem', 'ipsum']);
        Assert::assertAttributeEquals(['foo', 'bar', 'lorem', 'ipsum'], 'sqlExcludeTable', $this->subject);
    }

    /**
     * @test
     */
    public function filesExcludeSetterAndGetter() {
        // set value
        $testArray = ['foo', 'bar'];
        $this->subject->setExclude($testArray);
        // test getter
        $this->assertEquals($testArray, $this->subject->getExclude());
    }

    /**
     * @test
     */
    public function filesExcludeAddValues() {
        // set value
        $this->subject->setExclude(['foo', 'bar']);
        // add and check
        $this->subject->addExclude(['lorem', 'ipsum']);
        Assert::assertAttributeEquals(['foo', 'bar', 'lorem', 'ipsum'], 'exclude', $this->subject);
    }

    /**
     * @test
     */
    public function filesExcludeRemoveValues() {
        // set value
        $this->subject->setExclude(['foo', 'bar', 'lorem', 'ipsum']);
        // add and check
        $this->subject->removeExclude(['bar', 'lorem']);
        Assert::assertAttributeEquals(['foo', 'ipsum'], 'exclude', $this->subject, '', 0.0, 1, true);
    }

    /**
     * @test
     */
    public function filesIncludeSetterAndGetter() {
        // set value
        $testArray = ['foo', 'bar'];
        $this->subject->setInclude($testArray);
        // test getter
        $this->assertEquals($testArray, $this->subject->getInclude());
    }

    /**
     * @test
     */
    public function filesIncludeAddValues() {
        // set value
        $this->subject->setInclude(['foo', 'bar']);
        // add and check
        $this->subject->addInclude(['lorem', 'ipsum']);
        Assert::assertAttributeEquals(['foo', 'bar', 'lorem', 'ipsum'], 'include', $this->subject);
    }

    /**
     * @test
     */
    public function filesIncludeRemoveValues() {
        // set value
        $this->subject->setInclude(['foo', 'bar', 'lorem', 'ipsum']);
        // add and check
        $this->subject->removeInclude(['bar', 'lorem']);
        Assert::assertAttributeEquals(['foo', 'ipsum'], 'include', $this->subject, '', 0.0, 1, true);
    }
}
