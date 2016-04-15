<?php

namespace forum;

require_once('classes/subforum.class.php');
require_once('classes/category.class.php');

function getCategoryNames($db) {
	$query = 'SELECT * FROM categories WHERE id IN (SELECT category_id FROM subforums)';

	$resultCategories = $db->query($query);

	$categoryNames = array();

	while ($row = $resultCategories->fetch_assoc()) {
		$categoryNames[$row['id']] = $row['name'];
	}

	return $categoryNames;
}

function generateSubforumsList($resultSubforums, $categoryNames) {
	$subforums = array();

	$currentCategoryId = NULL;

	// Loop through list of subforums
	while ($row = $resultSubforums->fetch_assoc()) {
		$catId = $row['category_id'];

		if ($catId) {
			$catName = $categoryNames[$catId];

			if ($catId != $currentCategoryId) {
				$subforums[] = array(new Category($catId, $catName, NULL));
				$currentCategoryId = $catId;
			}

			$subforums[count($subforums) - 1][] = new Subforum($row['id'], $row['name'], NULL, $catId);
		}
		else {
			$subforums[] = new Subforum($row['id'], $row['name'], NULL, $catId);
		}
	}

	return $subforums;
}
