<form action="{$smarty.const.IA_RETURN_URL}completed/" method="post">
    {preventCsrf}
    <input type="hidden" name="payment_status" value="pending">
    <input type="hidden" name="payer_email" value="{$member.email}">
    <input type="hidden" name="first_name" value="{$member.fullname|escape}">
    <input type="hidden" name="last_name">
</form>