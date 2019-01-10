  <div class="css_login_body" align="center">

      <div class="css_login_padding">
          <div class="css_login_panel" align="center">
            <div class="css_login_tabel">
            <div style="position:relative; top:0px">
              <form name="login_form" method="post" method="<?= base_url('login') ?>">
                <table width="300px" class="table table-bordered css_login_tabel_in">
                  <tr>
                    <td style="padding:5px"><input type="text" name="login_input_user" style="width:100%"  placeholder="<?= $label_input_user ?>" autocomplete="off"></td>
                    <td style="padding:5px"><input type="password" name="login_input_pass" style="width:100%"  placeholder="<?= $label_input_pass ?>"></td>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding:5px">
                      <input type="submit" name="login_button_signin" value="<?= $label_btn_login ?>" style="width:100%" />
                    </td>
                  </tr>
                </table>
              </form>
            </div>

          </div>
        </div>
      </div>

  </div>