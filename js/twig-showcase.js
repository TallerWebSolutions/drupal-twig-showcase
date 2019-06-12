/**
 * @file
 * Plugin to handle storybook
 */
(function ($, Drupal) {
  Drupal.behaviors.storybook = {
    attach: function (context, settings) {
      const $context = $(context)
      const $items = $context.find('.twig-showcase-navigation li')
      const $components = $context.find('.component-wrapper .component')
      const componentId = window.localStorage.getItem('component')

      if (componentId) {
        const $component = $context.find(`.component-wrapper #${componentId}`)
        const $menuItem = $context.find(`.twig-showcase-navigation li[data-target=${componentId}]`)
        $component.addClass('show')
        $menuItem.addClass('active')
      }

      $items.click(e => {
        const $el = $(e.target)
        const id = $el.data('target')
        const $component = $context.find(`.component-wrapper #${id}`)

        $components.removeClass('show')
        $component.addClass('show')

        $items.removeClass('active')
        $el.addClass('active')
        window.localStorage.setItem('component', id)
      })
    }
  }
})(jQuery, Drupal)
