<?php

namespace AlexSkrypnyk\ShellVariablesExtractor\Tests\Functional;

use AlexSkrypnyk\ShellVariablesExtractor\Tests\Unit\UnitTestBase;

/**
 * Class CsvFormatterFunctionalTest.
 *
 * Functional tests for extractions.
 *
 * @group scripts
 *
 * phpcs:disable Drupal.Commenting.DocComment.MissingShort
 * phpcs:disable Drupal.Commenting.FunctionComment.Missing
 */
class CsvFormatterFunctionalTest extends FormatterFunctionalTestBase {

  public static function dataProviderFormatter() : array {
    return [
      // Extract all variables.
      [
        [
          '--sort' => TRUE,
          '--exclude-local' => TRUE,
          'paths' => [UnitTestBase::fixtureFile('test-data.sh')],
        ],
        <<<'EOD'
              Name;"Default value";Description
              VAR1;UNSET;
              VAR10;val10;"Description without a leading space."
              VAR11;val11;"Description without a leading space that goes on multiple lines and has a `VAR7`, `$VAR8`, $VAR9, VAR10 and VAR12 variable reference."
              VAR12;val12;"Description without a leading space that goes on multiple lines.
              
              And has a comment with no content."
              VAR13;val13;"And has an empty line before it without a content."
              VAR14;val14;
              VAR15;val16;
              VAR17;val17;
              VAR2;val2;
              VAR3;val3;
              VAR33;VAR32;
              VAR34;UNSET;
              VAR4;val4;
              VAR5;abc;
              VAR6;VAR5;
              VAR7;VAR5;
              VAR8;val8;
              VAR9;val9;"Description with leading space."
              VARENV1;valenv1;
              VARENV2;UNSET;
              VARENV3;valenv3;"Comment from script with reference to composer.lock and `composer.lock` again and somespecialtoken and `somespecialtoken` again and testorg/test-package and `testorg/test-package` again."
              VARENV4;UNSET;"Comment 2 from script without a leading space that goes on multiple lines."
              EOD,
      ],
    ];
  }

}
