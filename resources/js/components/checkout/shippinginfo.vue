 <template>
  <div class="hello-world">
    <div
      class="card-body mz-here card-body--padding--2"
      style="display: none;"
    >
      <h3 class="card-title">Shipping Information</h3>
      <div class="mt-4 mb-4 mz_shipping">
        <div class="form-group">
          <input type="radio" name="shipping_options" checked /> Express
          Domestic 12:00
        </div>
        <div class="form-group">
          <input type="radio" name="shipping_options" /> Express Domestic
        </div>
        <div class="form-group">
          <input type="radio" name="shipping_options" /> Express Easy Doc
        </div>
        <div class="form-group">
          <input type="radio" name="shipping_options" /> Citylane
        </div>
      </div>
      <div
        class="p-4 mt-4 mb-0 border shadow-none card"
        style="
          flex-direction: row;
          justify-content: space-between;
          padding: 0 !important;
        "
      >
        <table
          class="checkout__totals"
          style="width: 60%; margin: 0 !important"
        >
          <thead class="checkout__totals-header">
            <tr>
              <th style="width: 90px; padding: 10px">Image</th>
              <th style="padding: 10px">Product</th>
              <th style="padding: 10px">Total</th>
            </tr>
          </thead>
          <tbody class="checkout__totals-products">
            <input
              type="hidden"
              id="weight[]"
              name="weight[]"
              value="80"
            /><input type="hidden" id="length[]" name="length[]" /><input
              type="hidden"
              id="width[]"
              name="width[]"
            /><input type="hidden" id="height[]" name="height[]" />
            <tr>
              <td>
                <div class="p-1 rounded avatar-md">
                  <img
                    src="https://app.fa-bt.com/storage/images/thumbnail/1PQr2V7wHq7XmEK3vAj2W3RlU5WEqxiBZFeS2O0n.jpg"
                    alt="Tilta Hydra Arm Mini Pro Set"
                    class="img-fluid d-block"
                  />
                </div>
              </td>
              <td>
                Tilta Hydra Arm Mini Pro Set
                <p class="mb-0 text-muted">AED 44,100 x 1</p>
              </td>
              <td style="padding-right: 10px">44,100&nbsp;AED</td>
            </tr>
          </tbody>
        </table>
        <table
          class="checkout__totals"
          style="
            width: 40%;
            margin: 0 !important;
            background: #fff6ea;
            padding: 20px !important;
            display: flex;
            flex-direction: column;
          "
        >
          <tbody class="checkout__totals-subtotals">
            <tr>
              <th colspan="2" style="border-top: 0">Subtotal</th>
              <td style="border-top: 0">44,100.00 AED</td>
            </tr>
            <tr>
              <th colspan="2" style="border-top: 0">Shipping Fee (DHL)</th>
              <td style="border-top: 0">100.00&nbsp;AED</td>
            </tr>
            <tr>
              <th colspan="2">VAT</th>
              <td>2,205.00&nbsp;AED</td>
            </tr>
          </tbody>
          <tfoot class="checkout__totals-footer" style="font-size: 20px">
            <tr>
              <th colspan="2">Total</th>
              <td>46,405.00&nbsp;AED</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</template>
<style>
.hello-world {
  width: 100%;
  margin-bottom: 20px;
  /* margin-top: 20px; */
  /* height: 100px; */
  background-color: white;
}
</style>