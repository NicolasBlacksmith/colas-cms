<div class="row text-center">
    <div class="btn-group ">
        
        {if $pager_obj->getPrevNextVisibility()}
            <button class="btn btn-default" type="button" onClick="{$pager_obj->getClickCallback()}({$pager_obj->getPrevPageIndex()});"><i class="fa fa-angle-left"></i></button>
        {/if}
        
        {foreach $pager_obj->getVisiblePages() as $page}
            
            {if $page->index == $pager_obj->getCurrentPage()}
                <button class="btn btn-default active">{$page->title}</button>
            {else}
                <button class="btn btn-default" onClick="{$pager_obj->getClickCallback()}({$page->index});">{$page->title}</button>
            {/if}
            
        {/foreach}
        
        {if $pager_obj->getPrevNextVisibility()}
            <button class="btn btn-default" type="button" onClick="{$pager_obj->getClickCallback()}({$pager_obj->getNextPageIndex()});"><i class="fa fa-angle-right"></i></button>
        {/if}
        
    </div>
</div>