<?php

declare(strict_types=1);

namespace LineConverterTest;

use LineConverter\LineConverter;
use PHPUnit\Framework\TestCase;

class LineConverterTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param string $testData
     * @param string $expectedResult
     */
    public function testDoesConvertLineCorrectly(string $testData, string $expectedResult)
    {
        $this->assertSame($expectedResult, LineConverter::convertLine($testData));
    }

    public function dataProvider()
    {
        return [
            [
                '*** xref:bugtracker/triaging.adoc[Bug Triaging]',
                'include::{module_base_path}bugtracker/triaging.adoc[leveloffset=+3]'
            ],
            [
                '**** xref:app/tutorial/requirements.adoc[Developer Requirements]',
                'include::{module_base_path}app/tutorial/requirements.adoc[leveloffset=+4]'
            ],
            [
                '** xref:mobile_development/android_library/index.adoc[Android SDK]',
                'include::{module_base_path}mobile_development/android_library/index.adoc[leveloffset=+2]'
            ],
            [
                '',
                ''
            ],
        ];
    }
}
