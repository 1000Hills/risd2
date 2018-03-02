<?php

Route::get('/admin','AdminDashboardController@getIndex');

//////////////////////
// -- POLICE CHARTS //
//////////////////////
Route::get('/admin/api/dashboard/policing/typeofissues','AdminDashboardController@policetypeOfIssueChartData');
Route::get('/admin/api/dashboard/policing/genderofvictim','AdminDashboardController@policegenderOfVictimChartData');
Route::get('/admin/api/dashboard/policing/sectorofissue','AdminDashboardController@policesectorOfIssueChartData');
Route::get('/admin/api/dashboard/policing/landtypeissues','AdminDashboardController@policelandTypeIssueChartData');

// -- FOCAL PERSON CHARTS
Route::get('/admin/api/dashboard/focal/genderofcomplainants','AdminDashboardController@focalgenderOfComplainantsChartData');
Route::get('/admin/api/dashboard/focal/statusoftheissue','AdminDashboardController@statusOfTheIssueChartData');
Route::get('/admin/api/dashboard/focal/landhasallrequireddocument','admindashboardcontroller@landhasallrequireddocumentchartdata');
route::get('/admin/api/dashboard/focal/landrelatedissue','AdminDashboardController@landRelatedIssueChartData');

// -- ABUNZI CHARTS
Route::get('/admin/api/dashboard/abunzi/committeetypes','AdminDashboardController@committeetypesChartData');
Route::get('/admin/api/dashboard/abunzi/disputeperdistrict','AdminDashboardController@disputePerDistrictChartData');
Route::get('/admin/api/dashboard/abunzi/maleandfemalecases','AdminDashboardController@maleVsFemaleCasesChartData');
Route::get('/admin/api/dashboard/abunzi/receivedissuepermonth','AdminDashboardController@receivedIssuePerMonthChartData');
Route::get('/admin/api/dashboard/abunzi/typeanddistrictland','AdminDashboardController@landTypesofIssuesChartData');
Route::get('/admin/api/dashboard/abunzi/typeanddistrict','AdminDashboardController@notLandTypesofIssuesChartData');
Route::get('/admin/api/dashboard/abunzi/mediationPerformance','AdminDashboardController@mediationPerformanceChartData');