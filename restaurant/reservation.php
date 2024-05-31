<?php include('header.php');?>
<?php include('nav.php');?>
       
<div class="content">
    <div class="content">
        <h1>Welcome to Alphafootware</h1>

        <h2>ORDER FOOTWEAR</h2>

        <script>
            function confirmReservation() {
                var customer_name = document.getElementById('customer_name').value;
                var contact_number = document.getElementById('contact_number').value;
                var selected_size = document.getElementById('selected_size').value;
                var selected_color = document.getElementById('selected_color').value;

                if (customer_name !== '' && contact_number !== '' && selected_size !== '' && selected_color !== '') {
                    alert("Thank you for your order. We will process it shortly.");
                } else {
                    alert("Please fill in all the required fields.");
                }
            }
        </script>

        <form method="post" action="processing/customer-order.php">
            <table>
                <tr>
                    <td>Customer Name: *</td>
                    <td><input type="text" name="customer_name" id="customer_name" required="required"></td>
                </tr>
                <tr>
                    <td>Contact Number: *</td>
                    <td><input type="text" name="contact_number" id="contact_number" required="required"></td>
                </tr>
                <tr>
                    <td>Selected Size: *</td>
                    <td>
                        <select id="selected_size" name="selected_size">
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Selected Color: *</td>
                    <td>
                        <select id="selected_color" name="selected_color">
                            <option value="Black">Black</option>
                            <option value="Brown">Brown</option>
                            <option value="White">White</option>
                            <option value="Blue">Blue</option>
                            <option value="Red">Red</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="PLACE ORDER" name="submit" id="submit" onclick="confirmReservation()"></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('footer.php');?>
