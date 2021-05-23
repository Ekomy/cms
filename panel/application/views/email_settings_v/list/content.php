<div class="row">
    <div class="col-md-12">
        <h4 class="m-b-lg">
            E-Mail List
            <a href="<?php echo base_url("emailsettings/new_form"); ?>" class="btn btn-outline btn-primary btn-xs pull-right"> <i class="fa fa-plus"></i> Add New Item</a>
        </h4>
    </div><!-- END column -->
    <div class="col-md-12">
        <div class="widget p-lg">

            <?php if(empty($items)) { ?>

                <div class="alert alert-danger text-center">
                    <p>There is no data available. Please press <a href="<?php echo base_url("users/new_form"); ?>">this</a> to add</p>
                </div>

            <?php } else { ?>

                <table class="table table-hover table-striped table-bordered content-container">
                    <thead>
                        <th class="w50">#id</th>
                        <th>Main</th>
                        <th>Host</th>
                        <th>Protocol</th>
                        <th>Port</th>
                        <th>E-mail</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Operation</th>




                    </thead>
                    <tbody>

                        <?php foreach($items as $item) { ?>

                            <tr>
                                <td class="w50 text-center">#<?php echo $item->id; ?></td>
                                <td class="text-center"><?php echo $item->user_name; ?></td>
                                <td class="text-center"><?php echo $item->host; ?></td>
                                <td class="text-center"><?php echo $item->protocol; ?></td>
                                <td class="text-center w50"><?php echo $item->port; ?></td>
                                <td class="text-center w50"><?php echo $item->from; ?></td>
                                <td class="text-center"><?php echo $item->to; ?></td>
                                <td class="text-center w100">
                                    <input
                                            data-url="<?php echo base_url("users/isActiveSetter/$item->id"); ?>"
                                            class="isActive"
                                            type="checkbox"
                                            data-switchery
                                            data-color="#10c469"
                                        <?php echo ($item->isActive) ? "checked" : ""; ?>
                                    />
                                </td>
                                <td class="text-center w150">
                                    <button
                                            data-url="<?php echo base_url("users/delete/$item->id"); ?>"
                                            class="btn btn-sm btn-danger btn-outline remove-btn">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                    <a href="<?php echo base_url("users/update_form/$item->id"); ?>" class="btn btn-sm btn-info btn-outline"><i class="fa fa-pencil-square-o"></i>Edit</a>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            <?php } ?>

        </div><!-- .widget -->
    </div><!-- END column -->
</div>