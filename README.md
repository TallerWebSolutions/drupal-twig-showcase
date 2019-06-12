# Twig Showcase

Twig Showcase is a Drupal 8 module that enables a UI environment for twig templating within Drupal system.

## Motivation
Twig Showcase was made to have a place where is possible to build twig components on Drupal 8 without friction.

## How to use
Register stories using `*.stories.yml` in your theme.

### Example
```yml
button:
  path: 'card.showcase.html.twig'
  title: 'Button'
```
This register one showcase 'Button'. Each showcase needs a path to a html.twig page that will be rendered by Drupal.

*(NOTE: It is not necessary to have the `.showcase` extension on the file, but it is a good practice to have it, since this templates are not components but pages where components will be shown.)*
