@api
Feature: User authentication
  In order to protect the integrity of the website
  As a product owner
  I want to make sure only authenticated users can access the site administration

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

Scenario Outline: Authenticated user cannot access site administration
  Given I am logged in as a user with the authenticated role
  When I go to "<path>"
  Then I should get an access denied error

  Examples:
    | path            |
    | admin           |
    | admin/config    |
    | admin/content   |
    | admin/people    |
    | admin/structure |
