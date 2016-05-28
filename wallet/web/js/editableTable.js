/*
 *  This file is part of the HomeFinanceV2 project.
 *
 *  (c) Rafalsky.com <http://github.com/Rafalsky/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$('table.editable-table tbody').on('click', 'tr', function() {
  window.location.href = $(this).data('url');
});
