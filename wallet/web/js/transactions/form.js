/*
 * This file is part of the HomeFinanceV2 project.
 *
 * (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$receiptTable = $('table#receipt-table');
$receiptTable.on('change', 'input.product-name', function() {
  $.ajax({
    type: 'POST',
    url: '/transaction/new-row/',
    data: {
      rowNumber: $receiptTable.find('tr').length
    },
    success: function(data) {
      $('table#receipt-table input.product-name').last().closest('tr').after(data);
    }
  });
});
$receiptTable.on('change', 'input.product-total-price', function() {
  var sum = 0;
  $('input.product-total-price').each(function() {
    var number = $(this).val().replace(/,/g, '.');
    if (!isNaN(number)) sum = Number(sum) + Number(number);
  });
  $('#totalPrice').html(parseFloat(Math.round(sum * 100) / 100).toFixed(2));
});