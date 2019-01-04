<?php
require_once('includes/config.php');
require_once('includes/templates/header.php');

$main = New Main();
?>

<div class="center">
    <h1>A fast & free bitcoin<br> transaction accelerator</h1>
    <div class="message alert alert-warning" style="display:none;"></div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-9">

                <input type="text" name="txid" placeholder="Transaction ID..." id="txid" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn" onclick="sendTx($(this))">Accelerate</button>
            </div>
        </div>
    </div>
</div>
</header>
<div class="intro">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>Speed up unconfirmed transaction</h2>
                <p>
                    Have a transaction that has been unconfirmed for hours?
                    Speed up your confirmation by rebroadcasting it back into the bitcoin network.
                    Don't wait it out or pay the extra fees, use this free service to speed it up for free!
                </p>
            </div>
            <div class="col-md-4">
                <table class="table">
                    <tr>
                        <td>BTC</td>
                        <td>SOMEADDRESHERE</td>
                    </tr>
                    <tr>
                        <td>BTC</td>
                        <td>SOMEADDRESHERE</td>
                    </tr>
                    <tr>
                        <td>BTC</td>
                        <td>SOMEADDRESHERE</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    function sendTx(btn) {
        var txid = $('#txid').val();
        if (txid.length != 64)
            $("div.message").html('<p>The transaction ID is invalid!</p>').show();
        else {
            btn.attr('disabled', 'disabled');
            btn.html('Loading...');
            $.get('send.php?tx=' + txid, function (data) {
                response(data);
            });
        }
    }

    function response(data) {
        var msg = JSON.parse(data);
        console.log(msg.success);
        if (msg.success == true) {
            var message = 'The transaction has been re-broadcast to the bitcoin network';
        } else {
            var message = 'Transaction has already been confirmed';
        }
        $("div.message").html("<p>" + message + "</p>").show();
    }
</script>
<?php
require_once('includes/templates/footer.php');
?>
