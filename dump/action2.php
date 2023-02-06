<?php

//action.php

include('../sasmes2/osaActivity/db.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'fetch')
	{
		$students = array('idNumber', 'fullname','crs_yr_lvl', 'date','status');

		$main_query = "
		SELECT idNumber, fullname, crs_yr_lvl, date, status
		FROM student_data
		";

		$search_query = 'WHERE date <= "'.date('Y-m-d').'" AND ';

		if(isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] != '' && $_POST["end_date"] != '')
		{
			$search_query .= 'date >= "'.$_POST["start_date"].'" AND date <= "'.$_POST["end_date"].'" AND ';
		}

		if(isset($_POST["search"]["value"]))
		{
			$search_query .= '(idNumber LIKE "%'.$_POST["search"]["value"].'%" OR fullname LIKE "%'.$_POST["search"]["value"].'%" OR date LIKE "%'.$_POST["search"]["value"].'%" OR crs_yr_lvl LIKE "%'.$_POST["search"]["value"].'%" OR status LIKE "%'.$_POST["search"]["value"].'%")';
		}



		$group_by_query = " GROUP BY status ";

		$order_by_query = "";

		if(isset($_POST["order"]))
		{
			$order_by_query = 'ORDER BY '.$students[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
		}
		else
		{
			$order_by_query = 'ORDER BY date DESC ';
		}

		$limit_query = '';

		if($_POST["length"] != -1)
		{
			$limit_query = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$statement = $connect->prepare($main_query . $search_query /*.$group_by_query*/. $order_by_query);

		$statement->execute();

		$filtered_rows = $statement->rowCount();

		$statement = $connect->prepare($main_query );

		$statement->execute();

		$total_rows = $statement->rowCount();

		$result = $connect->query($main_query . $search_query /*.$group_by_query*/. $order_by_query . $limit_query, PDO::FETCH_ASSOC);

		$data = array();

		foreach($result as $row)
		{
			$sub_array = array();

			$sub_array[] = $row['idNumber'];

			$sub_array[] = $row['fullname'];
			
			$sub_array[] = $row['COURSE_YR_LEVEL'];

			$sub_array[] = $row['date'];

			$sub_array[] = $row['status'];

			$data[] = $sub_array;
		}

		$output = array(
			"draw"			=>	intval($_POST["draw"]),
			"recordsTotal"	=>	$total_rows,
			"recordsFiltered" => $filtered_rows,
			"data"			=>	$data
		);

		echo json_encode($output);
	}
}

?>