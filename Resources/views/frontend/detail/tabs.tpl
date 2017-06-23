{extends file='parent:frontend/detail/tabs.tpl'}

{block name="frontend_detail_tabs_navigation_inner"}
    {$smarty.block.parent}
    <a href="#" class="tab--link" title="Tab" data-tabName="tab">FAQ</a>
{/block}

{block name="frontend_detail_tabs_content_inner"}
    {$smarty.block.parent}
    <div class="tab--container">
        {* Normal title *}
        <div class="tab--header">
            <a href="#" class="tab--title"
               title="FAQ">FAQ</a>
        </div>
        {* Title for mobile mode *}
        <div class="tab--preview">
            <a href="#" class="tab--link">Für die FAQs hier klicken</a>
        </div>
        {* FAQ content *}
        <div class="tab--content">
            <div class="content--description">
                {foreach $lorem_faq as $question => $answers}
                    <div class="content--title">
                        {$question}
                    </div>
                    <div class="product--description">
                        <ul>
                            {foreach $answers as $answer}
                                <li>
                                    {$answer}
                                </li>
                            {/foreach}
                        </ul>
                    </div>
                {/foreach}
            </div>
        </div>
    </div>
{/block}
