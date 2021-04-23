<?php if(empty($item_images)) { ?>

    <div class="alert alert-warning text-center">
        <p>There is no image available. Please press <a href="<?php echo base_url("product/new_form"); ?>">this</a> to add</p>
    </div>

<?php } else { ?>
    <table class="table table-bordered table-striped table-hover pictures_list">
        <thead>
        <th class="order"><i class="fa fa-reorder"></i></th>
        <th class="w50">#id</th>
        <th>Image</th>
        <th>Name of the picture</th>
        <th>Status</th>
        <th>Cover</th>
        <th>Operation</th>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("product/imageRankSetter"); ?>">


        <?php foreach ($item_images as $image) { ?>

            <tr id="ord-<?php echo $image->id; ?>">
                <td class="order"><i class="fa fa-reorder"></i></td>
                <td class="w100 text-center">#<?php echo $image->id; ?></td>
                <td class="w100 text-center">
                    <img width="30" src="<?php echo base_url("uploads/{$viewFolder}/$image->image_url"); ?>" alt="<?php echo $image->image_url; ?>" class="img-responsive">
                </td>
                <td><?php echo $image->image_url; ?></td>
                <td class="w100 text-center">
                    <input
                        data-url="<?php echo base_url("product/imageIsActiveSetter/$image->id"); ?>"
                        class="isActive"
                        type="checkbox"
                        data-switchery
                        data-color="#10c469"
                        <?php echo ($image->isActive) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center">
                    <input
                            data-url="<?php echo base_url("product/isCoverSetter/$image->id/$image->product_id"); ?>"
                            class="isCover"
                            type="checkbox"
                            data-switchery
                            data-color="#ff5b5b"
                        <?php echo ($image->isCover) ? "checked" : ""; ?>
                    />
                </td>
                <td class="w100 text-center">
                    <button
                        data-url="<?php echo base_url("product/imageDelete/$image->id/$image->product_id"); ?>"
                        class="btn btn-sm btn-danger btn-outline remove-btn btn-block">
                        <i class="fa fa-trash"></i> Delete
                    </button>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>
<?php  } ?>