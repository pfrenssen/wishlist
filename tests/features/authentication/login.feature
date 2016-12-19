Feature: User login
  In order to use personalized features of the site
  As a user
  I want to log in using my credentials

  Scenario: Log in through the UI with e-mail address and password
    Given users:
    | name | pass       | mail               |
    | Mort | Ysabell123 | mort@sto-helit.org |
    When I visit "user"
    Then I should see the text "Log in"
    And I should see the text "Reset your password"
    And I should see the text "Username"
    And I should see the text "Password"
    But I should not see the text "Log out"
    And I should not see the text "My account"

  Scenario Outline: Anonymous user cannot access site administration
    Given I am not logged in
    When I go to "<path>"
    Then I should get an access denied error

    Examples:
      | path            |
      | admin           |
      | admin/config    |
      | admin/content   |
      | admin/people    |
      | admin/structure |
