Scenario Outline: Detecting an equilateral triangle
    Given I have side lengths <sideA>, <sideB>, <sideC>
    When I detect the triangle
    Then It results in an "Equilateral triangle"

    Examples:
        | sideA | sideB | sideC |
        | 4 | 4 | 4 |
        | 1 | 1 | 1 |
        | 8 | 8 | 8 |

Scenario Outline: Detecting an isosceles triangle
    Given I have side lengths <sideA>, <sideB>, <sideC>
    When I detect the triangle
    Then It results in an "Isosceles triangle"

    Examples:
        | sideA | sideB | sideC |
        | 2 | 2 | 1 |
        | 4 | 2 | 4 |
        | 1 | 3 | 3 |

Scenario Outline: Detecting a scalene triangle
    Given I have side lengths <sideA>, <sideB>, <sideC>
    When I detect the triangle
    Then It results in a "Scalene triangle"

    Examples:
        | sideA | sideB | sideC |
        | 4 | 2 | 1 |
        | 2 | 3 | 5 |
        | 8 | 2 | 1 |
