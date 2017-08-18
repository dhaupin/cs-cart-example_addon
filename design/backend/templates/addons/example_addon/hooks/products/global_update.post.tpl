{* Example - Admin product global update *}

<div class="control-group">
	<label class="control-label" for="gu_example_addon_flag">{__("example_addon")}:</label>
	<div class="controls">
		<input type="hidden" name="update_data[example_addon_flag]" id="example_addon_flag" value="N" />
		<input type="checkbox" name="update_data[example_addon_flag]" id="gu_example_addon_flag" value="Y" {if $product_data.example_addon_flag == "Y"}checked="checked"{/if}/>
	</div>
</div>

{* End Example *}