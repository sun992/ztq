{:section name=a loop=$address:}
  {:if $address[a].url=="":}
    {:if !$smarty.section.a.last:} 
        {:$address[a].title:}
    {:else:}
        <font class="cl">{:$address[a].title:}</font>
    {:/if:}  
  {:else:}
    <a href="{:$address[a].url:}">{:$address[a].title:}</a>
    {:if !$smarty.section.a.last:}
    &nbsp;&gt;&nbsp;
    {:/if:}
  {:/if:}    
{:/section:}