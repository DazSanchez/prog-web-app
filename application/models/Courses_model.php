<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Courses_model extends CI_Model
{
  function get_courses()
  {
    $colums =
      'courses.name as course_name,' .
      'courses.schedule,' .
      'courses.start_date,' .
      'courses.end_date,' .
      'courses.start_time,' .
      'courses.end_time,' .
      'courses.current_capacity,' .
      'courses.max_capacity,' .
      'courses.speciality,' .
      'instructors.name as instructor_name,' .
      'instructors.first_surname as instructor_first_surname,';

    $results = $this->db
      ->select($colums)
      ->from('courses')
      ->join('instructors', 'courses.id_instructor = instructors.id')
      ->get()
      ->result();

    $mapped_results = array_map(function ($result) {
      $result['instructor_name'] = $result->instructor_name . ' ' . $result->instructor_first_surname;
      $result['schedule'] = $result->start_time . '-' . $result->end_time;
      $result['capacity'] = $result->current_capacity . '/' . $result->max_capacity;
      return $result;
    }, $results);

    return $mapped_results;
  }
}
