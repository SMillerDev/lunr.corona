<?php

/**
 * This file contains the ResponseTestCase class.
 *
 * SPDX-FileCopyrightText: Copyright 2011 M2mobi B.V., Amsterdam, The Netherlands
 * SPDX-FileCopyrightText: Copyright 2022 Move Agency Group B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Corona\Tests;

use Lunr\Corona\Response;
use Lunr\Halo\LunrBaseTestCase;

/**
 * This class contains test methods for the Response class.
 *
 * @covers Lunr\Corona\Response
 */
abstract class ResponseTestCase extends LunrBaseTestCase
{

    /**
     * Instance of the tested class.
     * @var Response
     */
    protected Response $class;

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->class = new Response();

        parent::baseSetUp($this->class);
    }

    /**
     * TestCase Destructor.
     */
    public function tearDown(): void
    {
        unset($this->class);

        parent::tearDown();
    }

    /**
     * Unit test data provider for attributes accessible over __get.
     *
     * @return array<string[]> $attrs Array of attribute names and their default values.
     */
    public static function validResponseAttributesProvider(): array
    {
        $attrs   = [];
        $attrs[] = [ 'view', '' ];

        return $attrs;
    }

    /**
     * Unit test data provider for attributes inaccessible over __get.
     *
     * @return array<string[]> $attrs Array of attribute names.
     */
    public static function invalidResponseAttributesProvider(): array
    {
        $attrs   = [];
        $attrs[] = [ 'data' ];
        $attrs[] = [ 'resultMessage' ];
        $attrs[] = [ 'resultInfoCode' ];
        $attrs[] = [ 'resultCode' ];

        return $attrs;
    }

}

?>
