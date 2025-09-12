 function loadPackageDetails(packageId) {
            if (!packageId) return;
            $.ajax({
                url: 'get_package_details.php',
                type: 'GET',
                data: { package_id: packageId },
                success: function(response) {
                    const data = JSON.parse(response);
                    $('#update_package_name').val(data.package_name);
                    $('#update_package_description').val(data.package_description);
                    $('#update_package_price').val(data.package_price);
                    $('#update_package_category').val(data.package_category);
                    $('#package_id').val(data.package_id);
                },
                error: function() {
                    alert('Error loading package details.');
                }
            });
        }
       
 