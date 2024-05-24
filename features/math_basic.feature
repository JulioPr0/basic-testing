Feature: MathBasic

Scenario: Verify the MathBasic object
Given a MathBasic object

Scenario: Verify the add function
When the add function is called
Then it should return an error if not provided with two parameters
And it should return an error if the parameters are not numbers
And it should return the value of a + b when given two number parameters

Scenario: Verify the subtract function
When the subtract function is called
Then it should return an error if not provided with two parameters
And it should return an error if the parameters are not numbers
And it should return the value of a - b when given two number parameters

Scenario: Verify the multiply function
When the multiply function is called
Then it should return an error if not provided with two parameters
And it should return an error if the parameters are not numbers
And it should return the value of a * b when given two number parameters

Scenario: Verify the divide function
When the divide function is called
Then it should return an error if not provided with two parameters
And it should return an error if the parameters are not numbers
And it should return the value of a / b when given two number parameters
