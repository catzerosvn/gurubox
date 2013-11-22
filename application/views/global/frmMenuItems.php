<ul class="menu">
    <li><a href="<?php echo site_url("home"); ?>">Home</a></li>
    <li><a href="#">Payments</a></li>
    <li><a href="#">Members</a>
        <ul>
            <li><a href="<?php echo site_url("members"); ?>" class="adduser">Members</a></li>
        </ul>
    </li>
    <li><a href="#">Print</a>
        <ul>
            <li><a href="#" class="tax">Tax Invoice</a></li>
        </ul>
    </li>
    <li><a href="#">Reports</a>
        <ul>
            <li><a href="<?php echo site_url("report/frmReportIncomeDaily"); ?>" class="report">Income Daily</a></li>
            <li><a href="<?php echo site_url("report/frmReportIncomeMonth"); ?>" class="report">Income Monthly</a></li>
            <li><a href="<?php echo site_url("report/frmSalesPeople"); ?>" class="report">SalesPeople</a></li>
            <li><a href="<?php echo site_url("report/frmStockBalance"); ?>" class="report">Stock Balance</a></li>
        </ul>
    </li>
    <li><a href="#">Administrator</a>
        <ul>
            <li><a href="<?php echo site_url("staff"); ?>" class="staff">Staff</a></li>
            <li><a href="<?php echo site_url("selling"); ?>" class="cart">Sales System</a></li>
            <li><a href="<?php echo site_url("product"); ?>" class="product">Product Items</a></li>
            <li><a href="<?php echo site_url("product"); ?>" class="import">Product Import</a></li>            
        </ul>
    </li>
    <li><a href="#">Help</a>
        <ul>
            <li><a href="#" class="usermanual">Usermanual</a></li>
        </ul>
    </li>
    <li><a href="<?php echo site_url("signin/actionSignOut"); ?>">Sign out</a></li>

</ul>