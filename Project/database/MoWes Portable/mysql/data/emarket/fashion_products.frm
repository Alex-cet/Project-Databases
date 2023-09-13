TYPE=VIEW
query=select `emarket`.`products`.`Name` AS `Name`,`emarket`.`products`.`Price` AS `Price` from (`emarket`.`products` join `emarket`.`categories` on((`emarket`.`products`.`Category` = `emarket`.`categories`.`Name`))) where (`emarket`.`categories`.`Name` = \'Fashion\')
md5=f25ee3808356a6a1d37c97ee706a1d0c
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-05-27 18:56:55
create-version=1
source=SELECT Products.Name, Products.Price FROM Products \nJOIN categories ON Products.Category = categories.Name WHERE categories.Name = \'Fashion\'
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `emarket`.`products`.`Name` AS `Name`,`emarket`.`products`.`Price` AS `Price` from (`emarket`.`products` join `emarket`.`categories` on((`emarket`.`products`.`Category` = `emarket`.`categories`.`Name`))) where (`emarket`.`categories`.`Name` = \'Fashion\')
