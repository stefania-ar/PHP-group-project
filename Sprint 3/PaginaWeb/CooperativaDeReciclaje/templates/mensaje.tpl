{if isset($mensaje) && isset($tipoAlerta)}
    {if $tipoAlerta == "danger"}
        <div class="alert alert-danger" role="alert">
    {elseif $tipoAlerta == "success"}
        <div class="alert alert-success" role="alert">
    {elseif $tipoAlerta == "info"}
        <div class="alert alert-info" role="alert">
    {/if}
            {$mensaje}
        </div>
{/if}
