{* Example - Admin product edit - Addon tab *}

{include file="common/subheader.tpl" title="{__("example_addon")}" target="#example_addon"}

<div id="example_addon" class="in collapse">
	<fieldset>
	    <div class="control-group">
	        <label class="control-label" for="example_addon_flag">{__("example_addon")}:</label>
	        <div class="controls">
                <input type="hidden" name="product_data[example_addon_flag]" id="example_addon_flag" value="N" />
                <input type="checkbox" name="product_data[example_addon_flag]" value="Y" {if $product_data.example_addon_flag == "Y"}checked="checked"{/if}/>
	        </div>
	    </div>
	</fieldset>
</div>
{* End Example *}