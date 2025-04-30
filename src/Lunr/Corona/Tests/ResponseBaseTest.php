<?php

/**
 * This file contains the ResponseBaseTest class.
 *
 * SPDX-FileCopyrightText: Copyright 2011 M2mobi B.V., Amsterdam, The Netherlands
 * SPDX-FileCopyrightText: Copyright 2022 Move Agency Group B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Corona\Tests;

/**
 * This class contains test methods for the Response class.
 *
 * @covers     Lunr\Corona\Response
 */
class ResponseBaseTest extends ResponseTest
{

    /**
     * Test that the data array is empty by default.
     */
    public function testDataEmptyByDefault(): void
    {
        $this->assertArrayEmpty($this->get_reflection_property_value('data'));
    }

    /**
     * Test that there is no error message set by default.
     */
    public function testErrorMessageEmptyByDefault(): void
    {
        $this->assertArrayEmpty($this->get_reflection_property_value('errmsg'));
    }

    /**
     * Test that there is no error information set by default.
     */
    public function testErrorInfoEmptyByDefault(): void
    {
        $this->assertArrayEmpty($this->get_reflection_property_value('errinfo'));
    }

    /**
     * Test that the default return code is empty by default.
     */
    public function testReturnCodeIsEmptyByDefault(): void
    {
        $this->assertArrayEmpty($this->get_reflection_property_value('return_code'));
    }

    /**
     * Test that there is no view set by default.
     */
    public function testViewIsNotSetByDefault(): void
    {
        $this->assertPropertyEquals('view', '');
    }

}

?>
