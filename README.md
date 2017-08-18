## CS-Cart Boilerplate Addon v3.0

This addon provides a basic structure, template, and other necessary features to roll a CS-Cart addon v3.0. In this example, we show you how to create a Y/N checkbox field for a product, add it to edit page, and allow things like global/mass updating. If you are new or curious about module building for CS-Cart, you can use this repo as a boilerplate. If you are a dev and have more ideas for feature templates, please submit a pull :)

Obviously, this addon does nothing besides save the Y/N in the example product field, until you replace all instances of `example_addon` and its attributes with your own, or remove pieced to add your desired code. As it stands, learning/adding your code is easier because of:

### Included Addon Examples
- A pre-formatted addon.xml and language.po file
- Structure for function, script, and controller
- Example TPL script hooks for admin and catalog
- Enable/disable addon setting, per-storefront
- Install/uninstall DB procedures for a Y/N product field
- Option to abort uninstall DB procedure
- An example Y/N product field
- Option added to product edit page
- Product global/mass edit ability
- Extra hooks for product Y/N condition
- Extra functions for get/set

### Future Addon Examples
- TBA - Simple block schema, settings, and tpl

### Bonus: Addon Dev Tips
- Always check your addon functions against the per-storefront enable option if you choose to use this feature. It's cheaper and more granular to check loaded registry array than to run a function/chain to retun false or other things via your addon itself.
- Use override TPL hooks with extreme care, and always surround them with a conditional statement so they can revert back down the chain. Overrides are a last resort. If CS-Cart sees any output besides whitespace or linebreaks when your override isn't required, it will nuke the original and possibly other TPL requirements down the line, resulting in addon incompatibility.
- Never try to override the registry runtime `company_id` unless it's close to an exit. Doing so may cause adverse reactions in places you may not think are requiring it. There are a lot of things that go on behind the scenes in CS-Cart, please avoid mutating it's state.

Enjoy!
