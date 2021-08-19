{if isset($mensaje) && isset($tipoAlerta)}
    {if $tipoAlerta == "danger"}
        <div class="alert alert-danger" role="alert">
    {elseif $tipoAlerta == "success"}
        <div class="alert alert-success" role="alert">
    {/if}
            {$mensaje}
        </div>
{/if}
