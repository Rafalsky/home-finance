<?php /** @var $receiptProduct ReceiptProduct */ ?>
<tr>
    <td class="product-id"><?= $number; ?></td>
    <td>
        <div class="input-group" style="width: 100%">
            <input
                type="text"
                id="product-id<?= $number; ?>"
                name="Product[<?= $number; ?>][name]"
                class="form-control product-name"
                <?php if (isset($receiptProduct) && is_object($receiptProduct)): ?>
                    value="<?= $receiptProduct->product->name; ?>"
                <?php endif; ?>
            >
        </div>
    </td>
    <td>
        <div class="input-group" style="width: 100%">
            <input type="text" class="form-control product-count">
        </div>
    </td>
    <td>
        <div class="spinner">
            <div class="input-group">
                <input
                    type="text"
                    id="product-count-<?= $number; ?>"
                    name="Product[<?= $number; ?>][count]"
                    class="form-control product-count"
                    <?php if (isset($receiptProduct) && is_object($receiptProduct)): ?>
                        value="<?= $receiptProduct->count; ?>"
                    <?php endif; ?>
                >
            </div>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input
                type="text"
                id="product-price-<?= $number; ?>"
                name="Product[<?= $number; ?>][price]"
                class="form-control product-price"
                <?php if (isset($receiptProduct) && is_object($receiptProduct)): ?>
                    value="<?= $receiptProduct->total_price / $receiptProduct->count; ?>"
                <?php endif; ?>
            >
            <span class="input-group-addon">zł</span>
        </div>
    </td>
    <td>
        <div class="input-group">
            <input
                type="text"
                id="product-total-price-<?= $number; ?>"
                name="Product[<?= $number; ?>][totalPrice]"
                class="form-control product-total-price"
                <?php if (isset($receiptProduct) && is_object($receiptProduct)): ?>
                    value="<?= $receiptProduct->total_price; ?>"
                <?php endif; ?>
            >
            <span class="input-group-addon">zł</span>
        </div>
    </td>
    <td>
        <div class="remove-row">
            <i class="glyphicon glyphicon-remove red"></i>
        </div>
    </td>
</tr>