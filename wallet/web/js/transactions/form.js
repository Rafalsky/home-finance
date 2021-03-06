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
  if ((parseInt($(this).closest('tr').find('td.product-id').html())) != $receiptTable.find('tr.product-record').length) {
    return;
  }
  $.ajax({
    type: 'POST',
    url: '/transaction/new-row/',
    data: {
      rowNumber: $receiptTable.find('tr').length
    },
    success: function(data) {
      $('table#receipt-table input.product-name').last().closest('tr').after(data);
      setSelectize();
    }
  });
});
$receiptTable.on('change', 'input.product-count, input.product-price', function() {
  var $count = $(this).closest('tr').find('input.product-count').val();
  var $price = $(this).closest('tr').find('input.product-price').val();
  console.log($count);
  console.log($price);
  if ($count && $price) {
    $(this).closest('tr').find('input.product-total-price').val(+$count + +$price).trigger('change');
  }
});
$receiptTable.on('change', 'input.product-total-price', function() {
  var sum = 0;
  $('input.product-total-price').each(function() {
    var number = $(this).val().replace(/,/g, '.');
    if (!isNaN(number)) sum = Number(sum) + Number(number);
  });
  $('#totalPrice').html(parseFloat(Math.round(sum * 100) / 100).toFixed(2));
});

$receiptTable.on('click', '.remove-row', function() {
  if ($receiptTable.find('tbody tr').length == 1) {
    return;
  }
  $tr = $(this).closest('tr');
  var removedId = parseInt($tr.find('td.product-id').html());
  $tr.remove();
  $receiptTable.find('td.product-id').each(function() {
    $id = parseInt($(this).html());
    if ($id > removedId) {
       $(this).text($id - 1);
    }
  });
});

function setSelectize()
{
  $('select.selectize').selectize({create: true});
}

setSelectize();