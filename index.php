<?php
//Starting a session for this user
$a = session_id();
if (empty($a)) {
    session_start();
}
?>

<!doctype html>
<html>

<head>
    <title>PURE Search Project</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This is a web-based search tool in PURE">
    <meta name="author" content="Hussein Bakri">

    <!--To make search engines such as google.com NOT index the web tool-->
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--Datatable library CSS-->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/CustomCSS.css">

    <!--CSS Code accompanying yearpicker JS library-->
    <!--<link rel="stylesheet" href="css/yearpicker.css">-->

    <!-- Custom JS -->
    <script src="js/myscript.js"></script>

    <!--JQuery 3.3.1 Library    -->
    <script src="js/jquery-3.3.1.js"></script>

    <!--Popper JS Library (necessary for Bootstrap JS)-->
    <script src="js/popper.min.js"></script>

    <!--Bootstrap JS 4.3.1-->
    <script src="js/bootstrap.min.js"></script>

    <!-- JS files necessary for parsing the results JSON to CSV & EXCEL -->
    <script src="js/underscore-min.js"></script>
    <script src="js/blob.js"></script>
    <script src="js/filesaver.js"></script>
    <script src="js/json2.js"></script>
    <script src="js/strsup.js"></script>
    <script src="js/localread.js"></script>
    <script src="js/csvparse.js"></script>
    <script src="js/csvsup.js"></script>
    <script src="js/jQuery-csv.js"></script>
    <script src="js/alasql.min.js"></script>

    <!--SheetJS - Spreadsheets JS Library - https://github.com/SheetJS/js-xlsx -->
    <script src="js/xlsx.full.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.5/jspdf.plugin.autotable.js"></script>

    <link href="css/tabulator.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/tabulator.min.js"></script>

    <!-- The Moment JS-->
    <script src="js/moment.min.js"></script>


    <script src="js/ConverterCustomJS.js"></script>


    <!--Datatable For paginations, search features etc... on the HTML table of results-->
    <script src="js/jquery.dataTables.min.js"></script>
    <!-- <script src="js/yearpicker.js" async></script>-->


    <!--Favicon Icons of PURE Logo - different sizes-->
    <link rel="apple-touch-icon" sizes="57x57" href="images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<!-- Navigation code -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Documentation
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="HowToSearch.php">How to search</a>
                    <!--<a class="dropdown-item" href="HowToAnalysisTools.php">Analysis tools</a>-->
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- END of Navigation code -->

<!-- Code for Tab navigations -->
<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#searchtab" role="tab" data-toggle="tab">Search</a>
    </li>
    
</ul>

<!-- The Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade show active" id="searchtab" role="tabpanel">
        <!-- Beginning of Search Tab Pane -->
        <!-- ############################ -->

        <div class="jumbotron text-justify">
            <!-- <h2>Please complete the following form before we proceed:</h2> -->

            <div class="form_div col-xs-9">
                <form action="" method="POST" class="form-horizontal col-xs-9">

                    <div class="form-group">
                        <legend><strong>How do you want to search the PURE database?</strong></legend>
                        <fieldset id="RadioBtns">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="searchMethod"
                                       id="InclusionListRadioBtn"
                                       value="InclusionListRadio" checked>
                                <label class="form-check-label" for="InclusionListRadioBtn">
                                    Submit Keywords Inclusion List
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="searchMethod" id="FreeFormRadioBtn"
                                       value="FreeFormRadio">
                                <label class="form-check-label" for="FreeFormRadioBtn">
                                    Free form search
                                </label>
                            </div>
                        </fieldset>
                    </div>

                    <hr/>

                    <fieldset>
                        <div class="form-group" id="InclusionListDIV">

                            <legend><strong>Search Inclusion Keywords</strong></legend>

                            <label for="inclusionlistTextArea">Inclusion List of terms each one on a new line - you can
                                also put a group of words on a line. Ex: active learning</label>
                            <p>The default mode uses the OR boolean operator between terms, while using the AND will
                                make sure that all the terms (on new lines) are present in the same time in the search
                                metadata fields.</p>
                            <div id="BooleanCustomizations">
                                <fieldset id="RadioBtnsBooleanCustomizations">
                                    <!-- the size textbox -->
                                    <div class="form-group">
                                        <p><strong>Search with Boolean operations</strong></p>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input"
                                                   name="SearchWithBooleanOperators"
                                                   id="DefaultORRadioBtn" value="OROperator" checked>
                                            <label class="form-check-label" for="DefaultORRadioBtn">
                                                Use Default (OR)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input"
                                                   name="SearchWithBooleanOperators"
                                                   id="ANDOperatorRadioBtn" value="ANDOperator">
                                            <label class="form-check-label" for="DefaultANDRadioBtn">
                                                Use AND
                                            </label>
                                        </div>
                                </fieldset>
                            </div>


                            <textarea class="form-control necessary" rows="5" id="inclusionlistTextArea"
                                      placeholder="please include your keywords each one on new line..."></textarea>
                            <input type="file" id="ImportInclusionList" value="Import"
                                   onchange="handleInclusionFiles(this.files)" class="btn"/>
                            <button type="button" id="ClearInclusionList" onclick="ClearTextArea(this);"
                                    class="btn btn-primary">Clear
                            </button>
                            <hr>
                        </div>

                        <!-- the Query q textbox -->
                        <div class="form-group" id="FreeQuerySearchDIV">
                            <legend><strong>Free text search</strong></legend>
                            <p>Free text search using the <a
                                        href="http://lucene.apache.org/core/4_9_0/queryparser/org/apache/lucene/queryparser/classic/package-summary.html#Boolean_operators"
                                        target="_blank">Apache Lucene query syntax</a>. For an exact group of words: use
                                the double quotes Ex: "critical pedagogy" <br>Example of what you can use: learning AND
                                "community of practice" NOT "school"<br> Please see the <a
                                        href="HowToSearch.php?#KeywordList" target="_blank">documentation</a> for more
                                information</p>

                            <input type="text" name="query" id="query" class="necessary"
                                   style="width: 100%!important;"/>
                            <hr>
                        </div>

                        <!-- the Metadata fields textarea -->
                        <div class="form-group">
                            <legend><strong>PURE Metadata Fields</strong></legend>
                            <p>Filter the fields included in the response.</p>

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Metadata field</th>
                                    <th>Customize</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td>Type of the work</td>
                                    <td>
                                        <select id="TypeOfWorkSelectInput">
                                            <option value="AllTypes" selected>All Types</option>
                                            <option value="Abstract">Abstract</option>
                                            <option value="Anthology">Anthology</option>
                                            <option value="Article">Article</option>
                                            <option value="Book">Book</option>
                                            <option value="BookFilmArticleReview">Book/Film/Article review</option>
                                            <option value="Chapter">Chapter</option>
                                            <option value="ChapterPeerReviewed">Chapter (peer-reviewed)</option>
                                            <option value="CommentDebate">Comment/debate</option>
                                            <option value="CommissionedReport">Commissioned report</option>
                                            <option value="ConferenceContribution">Conference contribution</option>
                                            <option value="DiscussionPaper">Discussion paper</option>
                                            <option value="Editorial">Editorial</option>
                                            <option value="EntryEncyclopediaDictionary">Entry for
                                                encyclopedia/dictionary
                                            </option>
                                            <option value="Exhibition">Exhibition</option>
                                            <option value="FeaturedArticle">Featured article</option>
                                            <option value="Letter">Letter</option>
                                            <option value="Other">Other</option>
                                            <option value="OtherContribution">Other contribution</option>
                                            <option value="OtherReport">Other report</option>
                                            <option value="Paper">Paper</option>
                                            <option value="Poster">Poster</option>
                                            <option value="ReviewArticle">Review article</option>
                                            <option value="ScholarlyEdition">Scholarly edition</option>
                                            <option value="WebPublicationSite">Web publication/site</option>
                                            <option value="WorkingPaper">Working paper</option>

                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Organisational Unit Customization</td>
                                    <td>
                                        <form>
                                            <select id="OrganisationalUnitsSelectInput">
                                                <option value="Everything" selected>All Organisational Units</option>
                                                <option value="CHER">Only Centre for Higher Education Research (CHER)
                                                </option>
                                                <option value="NotInCHER">Everything Not in CHER</option>
                                                <option value="SchoolOfComputerScience">School of Computer Science
                                                </option>
                                                <option value="SchoolOfManagement">School of Management</option>
                                                <option value="SchoolOfMedicine">School of Medicine</option>
                                                <option value="SchoolOfBiology">School of Biology</option>
                                                <option value="SchoolOfPsychologyNeuroscience">School of Psychology and
                                                    Neuroscience
                                                </option>
                                                <option value="SchoolOfEconomicsFinance">School of Economics and
                                                    Finance
                                                </option>
                                                <option value="SchoolOfPhysicsAstronomy">School of Physics and
                                                    Astronomy
                                                </option>
                                                <option value="SchoolOfDivinity">School of Divinity</option>
                                                <option value="SchoolOfInternationalRelations">School of International
                                                    Relations
                                                </option>
                                                <option value="SchoolOfClassics">School of Classics</option>
                                                <option value="SchoolOfHistory">School of History</option>
                                                <option value="SchoolOfArtHistory">School of Art History</option>
                                                <option value="SchoolOfEarthEnvironmentalSciences">School of Earth &
                                                    Environmental Sciences
                                                </option>
                                                <option value="SchoolOfEnglish">School of English</option>
                                                <option value="SchoolOfMathematicsStatistics">School of Mathematics and
                                                    Statistics
                                                </option>
                                                <option value="SchoolOfGeographySustainableDevelopment">School of
                                                    Geography & Sustainable Development
                                                </option>
                                                <option value="SchoolOfChemistry">School of Chemistry</option>
                                                <option value="SchoolOfModernLanguages">School of Modern Languages
                                                </option>
                                                <option value="SchoolOfPhilosophicalAnthropologicalFilm">School of
                                                    Philosophical, Anthropological and Film Studies
                                                </option>
                                                <option value="EnglishLanguageTeaching">English Language Teaching
                                                </option>
                                                <option value="UniversityOfStAndrews">The University of XYZ
                                                </option>
                                                <option value="SocialAnthropologyDepartment">Social Anthropology
                                                    Department
                                                </option>
                                                <option value="StatisticsDepartment">Statistics Department</option>
                                                <option value="PureMathematicsDepartment">Pure Mathematics Department
                                                </option>
                                                <option value="AppliedMathematicsDepartment">Applied Mathematics
                                                    Department
                                                </option>
                                                <option value="PhilosophyDepartment">Philosophy Department</option>
                                                <option value="FilmStudiesDepartment">Film Studies Department</option>
                                                <option value="FrenchDepartment">French Department</option>
                                                <option value="SpanishDepartment">Spanish Department</option>
                                                <option value="ItalianDepartment">Italian Department</option>
                                                <option value="GermanDepartment">German Department</option>
                                                <option value="RussianDepartment">Russian Department</option>
                                                <option value="ArabicAndPersianDepartment">Arabic and Persian
                                                    Department
                                                </option>

                                                <option value="CentreAmerindianLatinAmericanCaribbeanStudies">Centre for
                                                    Amerindian, Latin American and Caribbean Studies
                                                </option>
                                                <option value="SirJamesMackenzieInstitute">Sir James Mackenzie Institute
                                                    for Early Diagnosis
                                                </option>
                                                <option value="TheLogosInstitute">The Logos Institute for Analytic and
                                                    Exegetical Theology
                                                </option>
                                                <option value="CentreStudyMedievalManuscripts">Centre for the Study of
                                                    Medieval Manuscripts and Technology
                                                </option>
                                                <option value="CentrePoeticInnovation">Centre for Poetic Innovation
                                                </option>
                                                <option value="InstituteStudyWarStrategy">Institute for the Study of War
                                                    and Strategy
                                                </option>
                                                <option value="CentreBiologicalDiversity">Centre for Biological
                                                    Diversity
                                                </option>
                                                <option value="InstituteBibleTheologyHermeneutics">Institute for Bible,
                                                    Theology & Hermeneutics
                                                </option>
                                                <option value="StAndrewsInstituteTransnationalSpatialHistory">
                                                    Institute for Transnational & Spatial History
                                                </option>
                                                <option value="CentreFrenchHistoryCulture">Centre for French History and
                                                    Culture
                                                </option>
                                                <option value="CentreRussianSovietCentral">Centre for Russian, Soviet,
                                                    Central and Eastern European Studies
                                                </option>
                                                <option value="CentrePeaceConflictStudies">Centre for Peace and Conflict
                                                    Studies
                                                </option>
                                                <option value="CentreInterdisciplinaryResearchComputationalAlgebra">
                                                    Centre for Interdisciplinary Research in Computational Algebra
                                                </option>
                                                <option value="CentrePoliticsScreenCultures">Centre for Politics of
                                                    Screen Cultures
                                                </option>
                                                <option value="CentreDynamicMacroeconomicAnalysis">Centre for Dynamic
                                                    Macroeconomic Analysis
                                                </option>
                                                <option value="CentreBiomedicalSciencesResearchComplex">Biomedical
                                                    Sciences Research Complex (Centre)
                                                </option>

                                            </select>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Metadata Fields</td>
                                    <td>
                                        <div class="form-group d-inline">
                                            <p>Check which metadata you want in your results, uncheck "All", allows you
                                                to customize..</p>
                                            <!-- Default checked -->
                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <form id="myform">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="AllMetadataCheckbox" value="AllCheckbox" checked>
                                                    <label class="custom-control-label"
                                                           for="AllMetadataCheckbox">All</label>
                                                </form>

                                            </div>
                                        </div>

                                        <div class="form-group" id="CustomCheckboxesDIV">
                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="TitleCheckbox" checked disabled>
                                                <label class="custom-control-label"
                                                       for="TitleCheckbox">Title</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="TypeCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="TypeCheckbox">Type</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="AuthorsCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="AuthorsCheckbox">Authors</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="OrnanisationalUnitsCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="OrnanisationalUnitsCheckbox">Organisational Units</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="JournalNameCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="JournalNameCheckbox">Journal Name</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="PublicationYearCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="PublicationYearCheckbox">Publication Year</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="PublicationMonthCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="PublicationMonthCheckbox">Publication Month</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="PublicationPlaceCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="PublicationPlaceCheckbox">Publication Place</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="PublisherNameCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="PublisherNameCheckbox">Publisher Name</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="PublicationSeriesCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="PublicationSeriesCheckbox">Publication Series</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="EditorsCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="EditorsCheckbox">Editors</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="KeywordsCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="KeywordsCheckbox">Keywords</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="DOICheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="DOICheckbox">DOI</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="AbstractCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="AbstractCheckbox">Abstract</label>
                                            </div>

                                            <div class="custom-control custom-checkbox d-inline-block">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="CreatedByUsernameCheckbox" checked>
                                                <label class="custom-control-label"
                                                       for="CreatedByUsernameCheckbox">username</label>
                                            </div>
                                        </div>

                                    </td>


                                </tr>
                                <tr>
                                    <td>Publication Year</td>
                                    <td>
                                        <div class="form-group">
                                            <fieldset id="RadioBtnsPublicationYearCustomizations">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input"
                                                           name="FixedOrRangeRadioGroup"
                                                           id="AnyPublicationYearRadioBtn" value="AnyYear" checked>
                                                    <label class="form-check-label" for="AnyPublicationYearRadioBtn">
                                                        Any Year
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input"
                                                           name="FixedOrRangeRadioGroup"
                                                           id="FixedPublicationYearRadioBtn" value="FixedYear">
                                                    <label class="form-check-label" for="FixedPublicationYearRadioBtn">
                                                        Fixed Year
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input"
                                                           name="FixedOrRangeRadioGroup"
                                                           id="RangePublicationYearRadioBtn" value="RangeYear">
                                                    <label class="form-check-label" for="RangePublicationYearRadioBtn">
                                                        Range
                                                    </label>
                                                </div>
                                            </fieldset>

                                            <div id="YearOfPublicationFixed" class="form-check">
                                                <input type="text" class="" value="2019"
                                                       id="PublicationYearFixedDatePicker">
                                            </div>

                                            <div id="YearOfPublicationRange" class="form-check">
                                                <input type="text" class="" value="1987"
                                                       id="PublicationYearLowerBoundDatePicker">
                                                To
                                                <input type="text" class="" value="2019"
                                                       id="PublicationYearUpperBoundDatePicker">
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <div class="form-group">
                                <button type="button" id="AdvancedMetadataFieldsCustomisations"
                                        onclick="$('#CustomAdvancedMetadataFieldsDIV').toggle(); $('#MetadataFieldsTextArea').val('');"
                                        class="btn btn-primary">Advanced Metadata Fields Customisations
                                </button>
                            </div>
                            <div class="form-group" id="CustomAdvancedMetadataFieldsDIV">
                                <label for="fields">Fields (each one on a new line):</label>
                                <textarea class="form-control" rows="5" id="MetadataFieldsTextArea"
                                          placeholder="provide multiple values in newlines..."></textarea>
                                <input type="file" id="MetadataFieldsList" value="Import"
                                       onchange="handleMetadataFieldsFiles(this.files)" class="btn"/>
                                <button type="button" id="DefaultMetadataFieldsList"
                                        onclick="IncludeDefaultFields(this);"
                                        class="btn btn-primary">Default Fields
                                </button>
                                <hr>
                            </div>
                        </div>
                    </fieldset>


                    <div id="NbofResults">
                        <fieldset id="RadioNbResultsBtns">
                            <!-- the size textbox -->
                            <div class="form-group">
                                <legend><strong>Number of Results</strong></legend>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="resultscustomization"
                                           id="First10NbofResultsRadioBtn" value="First10" checked>
                                    <label class="form-check-label" for="First10NbofResultsRadioBtn">
                                        First 10
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="resultscustomization"
                                           id="AllAvailableNbofResultsRadioBtn" value="AllAvailable">
                                    <label class="form-check-label" for="AllAvailableNbofResultsRadioBtn">
                                        All Available
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="resultscustomization"
                                           id="CustomNbofResultsRadioBtn" value="Custom">
                                    <label class="form-check-label" for="CustomNbofResultsRadioBtn">
                                        Custom
                                    </label>
                                </div>
                        </fieldset>
                    </div>


                    <div id="CustomNbofResultsTextBoxes">
                        <!-- the nb of results (i.e. size) textbox -->
                        <div class="form-group">
                            <p>Enter the number of results you want.</p>
                            <label class="control-label col-xs-6" for="size">Nb of Results: </label>
                            <input type="text" name="size" id="size" class="col-sm-2"/>
                            <hr>
                        </div>
                        <hr>
                    </div>


                    <hr>
                    <p> Execute the query you have chosen depending on parameters - this might take time even minutes
                        especially if you chose "All Available", so please be
                        patient...</p>
                    <button type="button" id="ExecuteQuerybtn" class="btn btn-primary">Execute Query</button>
                    <img src="images/progresscircle2.gif" id="ProgressCircleGIF" class="" alt="Responsive image"
                         style="width:100px;height:100px;"/>

                    <hr>

                    <div id="ResultsContainerDIV">
                        <legend><strong>Preview Table</strong></legend>
                        <p>This is a limited preview table with very few fields, aimed for viewing purposes. You can of
                            course
                            download the limited data in this preview table if you want to formats such as
                            CSV/Excel/JSON. </p>

                        <div class="table-controls-legend" hidden>Filter Parameters</div>

                        <div class="table-controls" hidden>
                            <span>
                              <label>Field: </label>
                              <select id="filter-field">
                                  <option></option>
                                  <option value="title">Title</option>
                                  <option value="type.0.value">Type</option>
                                  <option value="personAssociations.0.name.firstName">Author1 FirstName</option>
                                  <option value="personAssociations.0.name.lastName">Author 1 LastName</option>
                                  <option value="personAssociations.1.name.firstName">Author 2 FirstName</option>
                                  <option value="personAssociations.1.name.lastName">Author 2 LastName</option>
                                  <option value="journalAssociation.journal.name.0.value">Journal Name</option>
                                  <option value="managingOrganisationalUnit.name.0.value">Managing Organisational Name</option>
                                  <option value="managingOrganisationalUnit.externalId">Managing Organisational ID</option>
                                  <option value="publicationStatuses.0.publicationDate.year">Publication Year</option>
                                  <option value="publisher.name.0.value">Publisher Name</option>
                                  <option value="info.createdBy">Username</option>

                              </select>
                            </span>

                            <span>
                              <label>Type: </label>
                              <select id="filter-type">
                                  <option value="=">=</option>
                                  <option value="!=">!=</option>
                                  <option value="like">like</option>
                              </select>
                            </span>

                            <span><label>Value: </label> <input id="filter-value" type="text"
                                                                placeholder="value to filter"></span>

                            <button id="filter-clear">Clear Filter</button>
                        </div>

                        <div class="table-responsive" id="ResultsTableDIV"></div>

                    </div>

                    <br/>
                    <!-- Beginning of Convertion Logic -->
                    <div class="form-group">
                        <button type="button" id="ShowHideJSONDIV"
                                onclick="$('#JSONDIV').toggle();"
                                class="btn btn-primary">Show/Hide All search data JSON (for debugging only)
                        </button>&nbsp;&nbsp;
                    </div>

                    <div id="JSONDIV" class="form-group w100">

                        <textarea class="form-control" style="width: 90%;" rows="10" cols="80" id="txt1" wrap="off"
                                  placeholder="JSON result will appear here..." readonly></textarea>
                        <br/>
                        <input type="button" class="btn btn-primary" value="Beautify JSON" title="JSON Pretty"
                               onclick="document.getElementById('txt1').value=prettify(document.getElementById('txt1').value)">

                    </div>

                    <hr>
                    <legend><strong>Download Full Results</strong></legend>
                    <p>This part deals with downloading ALL the results of your search parameters not necessarily
                        what is contained in the preview table presented the previous section. The preview table will
                        show when you execute a search query.</p>

                    <form id="frm1" name="frm1" class="" role="form" onsubmit="return false">
                        <div class="form-group">
                            <p></p>
                            <label for="txta" class="control-label">CSV Rendition (debugging only):</label><br/>
                            <textarea id="txta" rows="10" cols="80" style="width:90%" wrap="off"
                                      placeholder="Comma Seperated Values (CSV) Rendition of Results"
                                      class="form-control" readonly></textarea>
                        </div>
                        <br/>
                        <div class="form-group form-inline">
                            <label>Filename: </label>
                            <input type="text" size="15" id="fn" value="SearchResults" class="form-control"
                                   title="Enter filename without extension"/>
                            &nbsp;<button class="btn btn-primary"
                                          onclick="saveFile(document.getElementById('txta').value,'csv');return false">
                                <span class="glyphicon glyphicon-save-file"></span> Search Results to CSV
                            </button>&nbsp;
                            <input type="button" class="btn btn-primary"
                                   onclick="runit(document.getElementById('txt1').value);saveExcel('txta',false);return false"
                                   value="Search Results to Excel" title="Convert Results to Excel file"/>
                        </div>

                    </form>
                    <!-- END of Convertion Logic -->

                </form>
            </div> <!-- This is the closing of div for the form -->

        </div> <!-- This is the closing of div for the jumbotron that contains the form -->

        <!-- ############################ -->
        <!-- End of Search Tab Pane -->
    </div>
</div>


<script>
    //JavaScript Global Variables
    var baseURL = "https://UNIVERSITYURL/ws/api/513/research-outputs?";

    //This is the main JavaScript Object/JSON that holds the different search parameters and conditions
    var JSONtoSend;

    //Function that handles the data from InclusionList file chooser.
    function handleInclusionFiles(et) {
        var file = document.getElementById("ImportInclusionList").files[0];

        var reader = new FileReader();
        reader.onload = function (e) {
            var textArea = document.getElementById("inclusionlistTextArea");
            textArea.value = e.target.result;
        };
        reader.readAsText(file);

    }


    function handleMetadataFieldsFiles(et) {
        /**
         * A function that handles the data from Metadata fields file chooser.
         * This function is still used
         * **/

        var file = document.getElementById("MetadataFieldsList").files[0];

        var reader = new FileReader();
        reader.onload = function (e) {
            var textArea = document.getElementById("MetadataFieldsTextArea");
            textArea.value = e.target.result;
        };
        reader.readAsText(file);
    }


    function IncludeDefaultFields(ex) {
        /**
         * A function that handles the default button of the PURE Metadata fields
         * This function is still used
         * **/

        var textArea = document.getElementById("MetadataFieldsTextArea");
        textArea.value = "title\ntype.value\nmanagingOrganisationalUnit.externalId\nmanagingOrganisationalUnit.name.value\norganisationalUnits.name.value\norganisationalUnits.externalId\njournalAssociation.journal.name.value\npublicationStatuses.publicationDate.year\npublicationStatuses.publicationDate.month\nplaceOfPublication\npublisher.name.value\npublicationSeries.name\npublicationSeries.publisherName\npublicationSeries.issn\nhostPublicationEditors.firstName\nhostPublicationEditors.lastName\nkeywordGroups.keywordContainers.userDefined.freeKeyword\npersonAssociations.name.firstName\npersonAssociations.name.lastName\npersonAssociations.1.person.name.value\npersonAssociations.organisationalUnits.name.value\npersonAssociations.authorCollaboration.name.value\nexternalOrganisations.name.value\nelectronicVersions.doi\nhostPublicationTitle\nabstract.value\ninfo.createdBy";
    }


    function getHowManyResultsforSearch(JSONRepresentationOfSearch) {
        /**
         * A function that was created for the version 2 of the tool
         * It takes a JSON representation of a search query
         * It returns an integer which the total number of results for the search query
         * This function is still used
         * **/
        var results_count;
        $.ajax({
            type: "POST",
            url: "APIResultsSizeHandler.php",
            async: false,
            data: {
                JSON: JSONRepresentationOfSearch
            },
            dataType: 'text',
            success: function (response) {
                var ParsedJSON = JSON.parse(response);
                results_count = ParsedJSON['count'];
                //console.log("Size of results of your search now from AJAX Size Query: " + results_count);
            }
        });
        return results_count;
    }

    function retrieveDatafromGUIoutputJSObj() {
        /**
         * A function that was created for the version 2 of the tool
         * It prepares a JavaScript object that is a JSON representation of search criteria
         * to be sent to the server (APIHandler.php)
         * It takes the values form GUI components, it cleans and constructs the data as necessary.
         * This function helps in sending a POST request on the server side with customized search
         * criteria in the body
         * This function is still used
         * **/

        var inclusionTextAreaContent = $('#inclusionlistTextArea').val();
        var query = $('#query').val();
        var MetadataFields = $('#MetadataFieldsTextArea').val();
        var size = $('#size').val();
        var offset = $('#offset').val();
        var page = $('#page').val();
        var pageSize = $('#pageSize').val();

        var JSONofData;

        if (!(typeof query === 'undefined' || query === null || query == "")) {

            //Giving the JSONofData object the searchString (Free form search method)
            JSONofData = {
                "searchString": query
            };

        } else if (!(typeof inclusionTextAreaContent === 'undefined' || inclusionTextAreaContent === null || inclusionTextAreaContent == "")) {
            //Since each term is on a new line - splitting on \n
            var inclusionTextArray = inclusionTextAreaContent.split("\n");

            var inclusionTextArrayLength = inclusionTextArray.length;
            for (var i = 0; i < inclusionTextArrayLength; i++) {
                console.log(inclusionTextArray[i]);
                //Trimming spaces before and after words given by users
                inclusionTextArray[i] = inclusionTextArray[i].trim();

                //the following logic checks if there is at least two words
                //if true, we would append \" before and after
                if (inclusionTextArray[i].trim().indexOf(' ') != -1) {
                    inclusionTextArray[i] = "\"" + inclusionTextArray[i] + "\"";
                }
            }

            //get from GUI what user chose AND or OR
            var BooleanOperatorRadioValue = $("input[name='SearchWithBooleanOperators']:checked").val();
            //console.log("SearchWithBooleanOperators Radio btn is: " + BooleanOperatorRadioValue);
            var inclusionTextString;

            if (BooleanOperatorRadioValue == "ANDOperator") {
                //ANDOperatorRadioBtn
                inclusionTextString = inclusionTextArray.join(" AND ");
            } else if (BooleanOperatorRadioValue == "OROperator") {
                //OROperatorRadioBtn
                inclusionTextString = inclusionTextArray.join(" OR ");
            } else {
                console.warn("Something is wrong with Boolean operator (OR/AND) Search!");
            }
            //Building the JSON so that it can be sent via AJAX
            //Giving the JSONofData object the searchString (Submit Keywords Inclusion List method)
            JSONofData = {
                "searchString": inclusionTextString
            };

            //console.log(JSONofData);
        }


        //Retrieving from size textbox
        if (!(typeof size === 'undefined' || size === null || size == "")) {
            console.log("size is: " + size);
            //size is string - do not forget that
            console.log("type of size: " + typeof (size));

            //Appending or adding size to the Javascript OBJ (i.e. the JSON)
            JSONofData.size = size;

        } else {
            //here the user did not choose custom (i.e. for specifying the size)
            //User did not specify a size in textbox...

            //get from GUI what user chose either First 10 (default) or "All"
            var ResultsTypeRadioValue = $("input[name='resultscustomization']:checked").val();
            //console.log("resultscustomization Radio btn is: " + ResultsTypeRadioValue);

            if (ResultsTypeRadioValue == "First10") {
                // The default size of results is size=10 - it is better to assign it explicitly
                JSONofData.size = 10;

            } else {
                //In this case (not first 10 radio button and nothing in the size textbox ==> All results
                //Now we need to figure out how many results in total so that we can ask for them
                //Sending a specific AJAX call just to figure out total count of results of the search...
                JSONofData.size = getHowManyResultsforSearch(JSONofData);
                //console.log("***Size after AJAX code that figure out the total nb of results: " + JSONofData.size);
            }
        }

        /**
         * PROCESSING THE METADATA FIELDS BLOCK
         * **/

            //Getting from GUI what the user have chosen from the dropdown list for "Type of the work"
        var TypeOfWorkSelect = $('#TypeOfWorkSelectInput').val();
        //console.log("Type of work select input: " + TypeOfWorkSelect);

        if (TypeOfWorkSelect == "AllTypes") {
            //All Types is selected
            //console.log($('#TypeOfWorkSelectInput option').filter(':selected').text());

            //The reason for this empty array is to default the request which gives everything
            var TypeSingletonArray = [];
            JSONofData.typeUris = TypeSingletonArray;

        } else if (TypeOfWorkSelect == "Abstract") {
            //console.log($('#TypeOfWorkSelectInput option').filter(':selected').text() + " is selected");
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/abstract"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Anthology") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/bookanthology/anthology"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Article") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/article"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Book") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/bookanthology/book"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "BookFilmArticleReview") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontoperiodical/book"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Chapter") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontobookanthology/chapter"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "ChapterPeerReviewed") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontobookanthology/peerreviewedchapter"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "CommentDebate") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/comment"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "CommissionedReport") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/bookanthology/commissioned"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "ConferenceContribution") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontobookanthology/conference"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "DiscussionPaper") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/workingpaper/discussionpaper"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Editorial") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/editorial"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "EntryEncyclopediaDictionary") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontobookanthology/entry"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Exhibition") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/nontextual/exhibition"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "FeaturedArticle") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontoperiodical/featured"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Letter") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/letter"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Other") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontoconference/other"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "OtherContribution") {
            //console.log($('#TypeOfWorkSelectInput option').filter(':selected').text() + " is selected");
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontobookanthology/other"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "OtherReport") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/bookanthology/other"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Paper") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontoconference/paper"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "Poster") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontoconference/poster"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "ReviewArticle") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/contributiontojournal/systematicreview"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "ScholarlyEdition") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/bookanthology/scholarly"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "WebPublicationSite") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/nontextual/web"];
            JSONofData.typeUris = TypeSingletonArray;
        } else if (TypeOfWorkSelect == "WorkingPaper") {
            var TypeSingletonArray = ["/dk/atira/pure/researchoutput/researchoutputtypes/workingpaper/workingpaper"];
            JSONofData.typeUris = TypeSingletonArray;
        } else {
            console.warn("Unknown Type of work selected, something wrong...");
        }

        //Getting from GUI what the user have chosen from the dropdown list for "Organisational Unit Customization"
        var OrganisationalUnitSelect = $('#OrganisationalUnitsSelectInput').val();
        if (OrganisationalUnitSelect == "Everything") {
           
            //The reason for this empty array is to default the request which should give everything
            var OrganisationalUnitUUIDSingletonArray = [];

            //First we should create the object forOrganisationalUnits itself
            JSONofData.forOrganisationalUnits = {};

            //Then create an array to be put inside uuids
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "CHER") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["0e1f3de9-592e-4235-84f7-431e58853805"];

            //First we should create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "NotInCHER") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");

            //HERE no need to involve UUIDs as this can be done via the searchString Lucene Query
            //console.log("Search String here: ");
            //console.log(JSONofData.searchString);
            //the solution is only to append to the search string excluding "Centre for Higher Education Research"
            JSONofData.searchString = JSONofData.searchString + " AND -\"Centre for Higher Education Research\"";

        } else if (OrganisationalUnitSelect == "SchoolOfComputerScience") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["6eab485b-fea1-4d37-96cc-dbea0ea5b725"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;
        } else if (OrganisationalUnitSelect == "SchoolOfManagement") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["38290c32-d52d-4936-9467-bb188e4310da"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;
        } else if (OrganisationalUnitSelect == "SchoolOfMedicine") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["81051d78-1b5d-42ac-ac97-5cb0d9093fc3"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfBiology") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["a348f890-b967-4e22-a8ae-75e33143747f"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfPsychologyNeuroscience") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["e1dc1e3f-980e-4a49-8e46-b0ce898eccbb"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfEconomicsFinance") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["c12cf4c0-5104-4175-9230-bde51e032377"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfPhysicsAstronomy") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["55fe42e3-503b-4cbb-8d87-1904c4dd6bf1"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfDivinity") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["16a25fcc-eaff-428f-be43-e07cae15c277"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfInternationalRelations") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["54dde83e-0814-4c42-9fc7-d26c014f8281"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfClassics") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["36412e1e-9cd9-4f0b-99a4-e95eb9ac3141"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfHistory") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["78741708-7c2a-4431-993e-9002933c6e57"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfArtHistory") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["5cc42fee-6503-4425-9d2b-afba1e378802"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfEarthEnvironmentalSciences") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["395eb4e4-a608-49df-9d52-139e40a37842"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfEnglish") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["d5e6484c-56f7-4177-9064-c390fdb151ae"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfMathematicsStatistics") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["1eacc1e6-1b47-44a5-bea4-9fc0e57d48d1"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfGeographySustainableDevelopment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["b60a2c8e-a7f1-49fc-bc8b-8ea10cdd3c18"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfChemistry") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["42aabe6a-5b0e-4776-a2bd-90c0849be6e7"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfModernLanguages") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["14886d55-a04c-4a38-9092-95af7ef6b101"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "SchoolOfPhilosophicalAnthropologicalFilm") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["e269274d-c863-4d9b-bc86-571d00bbe03e"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "EnglishLanguageTeaching") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDSingletonArray = ["c6458e16-01d9-46e6-a586-4e2e2c529f54"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDSingletonArray;

        } else if (OrganisationalUnitSelect == "UniversityOfStAndrews") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["6718dc8a-84c6-4665-aaa0-99b22ca6a7e6"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SocialAnthropologyDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["894730e5-dfb1-4c2e-afda-b535574cf5d1"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "StatisticsDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["bc91f838-91b0-46f6-8dbc-5eec88a7ca3a"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "PureMathematicsDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["7440f2c4-1c9d-49af-b6a7-8dde8c601d66"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "AppliedMathematicsDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["7ced2051-626a-4266-a5c6-86a7d7efff89"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "PhilosophyDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["7340ca8b-3421-429f-aa99-ca035cf769de"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "FilmStudiesDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["6365982c-1bb7-453b-97c3-b43eaa9ae50e"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "FrenchDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["8108046b-1aba-4337-9e5b-9055fadebbe4"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SpanishDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["ab7c658a-2a1e-4d0e-b44b-8b17bbb1ccf2"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "ItalianDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["3e716451-5157-40bb-8ff3-25e7b87e06c9"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "GermanDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["5dc00caf-b238-44e0-a2f7-97e607add0b6"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "RussianDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["9e48abdb-33d9-4269-a476-74cc49a581bd"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "ArabicAndPersianDepartment") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["b6aa83eb-a6d6-44d6-bfdc-35a996700c32"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreAmerindianLatinAmericanCaribbeanStudies") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["d6c937e7-48db-4a01-8511-70ded09b69b0"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "SirJamesMackenzieInstitute") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["cb86a09d-2a9e-454a-a071-a2367cfe7846"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "TheLogosInstitute") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["6287c4fd-3017-4967-b3ce-63ecf8abf25f"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreStudyMedievalManuscripts") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["e6390e80-6047-420c-a583-e4a880d46e2a"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentrePoeticInnovation") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["b4ef0a8d-353b-42c4-a883-ec2bb60437ab"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "InstituteStudyWarStrategy") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["de001ea9-4bb9-4b1c-b2f4-03f77d4ae25d"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreBiologicalDiversity") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["c46fa32e-e533-4f58-9af4-67e7f1afd9a4"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "InstituteBibleTheologyHermeneutics") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["69f9529c-bf7d-483f-bf99-0bdbf2b636bf"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "StAndrewsInstituteTransnationalSpatialHistory") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["45685edc-f0d4-49db-8330-6106b8eb6a6d"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreFrenchHistoryCulture") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["a11332fc-2561-4569-b7ce-c5f92ad209c7"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreRussianSovietCentral") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["4c0ad3fe-bb84-462f-81bb-badfed78fd07"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentrePeaceConflictStudies") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["77c89cf7-4aa1-469d-a553-2a498cd4a9e0"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreInterdisciplinaryResearchComputationalAlgebra") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["71cb826f-1d11-4afd-9d11-f2fb885e8eea"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentrePoliticsScreenCultures") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["66d412d8-29f6-4f38-ba1c-853eacd773db"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreDynamicMacroeconomicAnalysis") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["558d3812-3791-4139-a082-90e589b9f6ec"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else if (OrganisationalUnitSelect == "CentreBiomedicalSciencesResearchComplex") {
            console.log($('#OrganisationalUnitsSelectInput option').filter(':selected').text() + " is selected");
            var OrganisationalUnitUUIDNonSingletonArray = ["9cfa4d42-511d-4106-8210-f80610f0cb5b"];

            //first we create the object forOrganisationalUnits
            JSONofData.forOrganisationalUnits = {};
            JSONofData.forOrganisationalUnits.uuids = OrganisationalUnitUUIDNonSingletonArray;

        } else {
            console.error("Unknown Organisational Unit selected, something wrong");
        }

        //Logic to retrieve and handle metadata fields
        if (document.getElementById("AllMetadataCheckbox").checked == true) {
            //If the array is sent as empty it tells the API that all metadata are required
            JSONofData.fields = [];
            //console.log("All metadata has been given - expect everything in Excel files..");

        } else {

            if (document.getElementById("TitleCheckbox").checked == true) {
                JSONofData.fields = [];
                JSONofData.fields.push("title");
                //console.log("Fields in JSONtoSend: title, hostPublicationTitle");
            }

            if (document.getElementById("TypeCheckbox").checked == true) {
                JSONofData.fields.push("type.value");
            }

            if (document.getElementById("AuthorsCheckbox").checked == true) {
                JSONofData.fields.push("personAssociations.name.firstName", "personAssociations.name.lastName", "personAssociations.1.person.name.value", "personAssociations.authorCollaboration.name.value");
            }

            if (document.getElementById("OrnanisationalUnitsCheckbox").checked == true) {
                JSONofData.fields.push("managingOrganisationalUnit.externalId", "managingOrganisationalUnit.name.value", "organisationalUnits.name.value", "organisationalUnits.externalId", "personAssociations.organisationalUnits.name.value", "externalOrganisations.name.value");
            }

            if (document.getElementById("JournalNameCheckbox").checked == true) {
                JSONofData.fields.push("journalAssociation.journal.name.value");
            }

            if (document.getElementById("PublicationYearCheckbox").checked == true) {
                JSONofData.fields.push("publicationStatuses.publicationDate.year");
            }

            if (document.getElementById("PublicationMonthCheckbox").checked == true) {
                JSONofData.fields.push("publicationStatuses.publicationDate.month");
            }

            if (document.getElementById("PublicationPlaceCheckbox").checked == true) {
                JSONofData.fields.push("placeOfPublication");
            }

            if (document.getElementById("PublisherNameCheckbox").checked == true) {
                JSONofData.fields.push("publisher.name.value");
            }

            if (document.getElementById("PublicationSeriesCheckbox").checked == true) {
                JSONofData.fields.push("publicationSeries.name", "publicationSeries.publisherName", "publicationSeries.issn", "hostPublicationTitle");
            }

            if (document.getElementById("EditorsCheckbox").checked == true) {
                JSONofData.fields.push("hostPublicationEditors.firstName", "hostPublicationEditors.lastName");
            }

            if (document.getElementById("KeywordsCheckbox").checked == true) {
                JSONofData.fields.push("keywordGroups.keywordContainers.userDefined.freeKeyword");
            }

            if (document.getElementById("DOICheckbox").checked == true) {
                JSONofData.fields.push("electronicVersions.doi");
            }

            if (document.getElementById("AbstractCheckbox").checked == true) {
                JSONofData.fields.push("abstract.value");
            }

            if (document.getElementById("CreatedByUsernameCheckbox").checked == true) {
                JSONofData.fields.push("info.createdBy");
            }

            //retrieving from metadata fields textarea
            if (!(typeof MetadataFields === 'undefined' || MetadataFields === null || MetadataFields == "")) {
                //TODO: Requires changes
                //reset what is in the JSONofData Fields in order to get what is in textarea
                JSONofData.fields = [];
                var MetadataFieldsArray = MetadataFields.split("\n");
                JSONofData.fields = MetadataFieldsArray;
                console.log("Metadata fields submitted in Textarea: " + JSONofData.fields);
            }
        }

        //retrieving and dealing with year of publication choice logic
        var PublicationYearRadioValue = $("input[name='FixedOrRangeRadioGroup']:checked").val();

        if (PublicationYearRadioValue == "AnyYear") {
            //sending empty strings tells the API any date
            JSONofData.publicationStatuses = [];
            JSONofData.publishedBeforeDate = "";
            JSONofData.publishedAfterDate = "";
        }

        if (PublicationYearRadioValue == "FixedYear") {
            console.log("USER chose Fixed Year");

            //get value from textbox that user choose value
            var YearUserChoice = $("#PublicationYearFixedDatePicker").val();
            console.log("User chose: " + YearUserChoice);

            //The following is just to get published since if a paper is in progress,
            //It will give us many dates (published means the final date in publicationStatuses)
            //I faced a problem (maybe still have it) that years in the Preview table are not the years requested
            //but it turns out they are correct since publicationStatuses as I said contains many "years", per example
            //A paper X might have 2012 (submission date), 2013 and 2014 (final published year)
            //It is very complicated to know dynamically how many items i.e. years for each output paper
            //Plz comment out the following if you do not want to filter based on only "published"
            // JSONofData.publicationStatuses = ["/dk/atira/pure/researchoutput/status/published"];


            //give me everything before the end of year midnight of user choice
            //var BeforeDateRenditionOfYear = YearUserChoice + "-12-31T23:59:59.000Z";
            //var BeforeDateRenditionOfYear = YearUserChoice + "-12-30T20:00:00.112+0000";
            var BeforeDateRenditionOfYear = YearUserChoice + "-12-31";
            JSONofData.publishedBeforeDate = BeforeDateRenditionOfYear;


            //give me everything after the beginning of year of user choice
            // var AfterDateRenditionOfYear = YearUserChoice + "-01-01T01:57:58.636Z";
            //var AfterDateRenditionOfYear = YearUserChoice + "-01-02T01:00:00.112+0000";
            var AfterDateRenditionOfYear = YearUserChoice + "-01-01";
            JSONofData.publishedAfterDate = AfterDateRenditionOfYear;

            //the orderings parameter at the end means the latest comes first, and it falls within the specified period (see Lucene Syntax)
            JSONofData.orderings = ["-publicationYear"];
        }

        if (PublicationYearRadioValue == "RangeYear") {
            console.log("USER chose Range Year");
            var LowerYearUserChoice = $("#PublicationYearLowerBoundDatePicker").val();
            var UpperYearUserChoice = $("#PublicationYearUpperBoundDatePicker").val();
            // JSONofData.publicationStatuses = ["/dk/atira/pure/researchoutput/status/published"];

            console.log("Lower Bound Date is: " + LowerYearUserChoice);
            console.log("Upper Bound Date is: " + UpperYearUserChoice);

            //the end of the year of the upper bound
            //var UpperRenditionOfYearRange = UpperYearUserChoice + "-12-31T23:59:59.000Z";
            var UpperRenditionOfYearRange = UpperYearUserChoice + "-12-31";
            console.log(UpperRenditionOfYearRange);
            JSONofData.publishedBeforeDate = UpperRenditionOfYearRange;

            //the beginning of the year of the lower bound
            //var LowerRenditionOfYearRange = LowerYearUserChoice + "-01-01T01:57:58.636Z";
            var LowerRenditionOfYearRange = LowerYearUserChoice + "-01-01";

            console.log(LowerRenditionOfYearRange);
            JSONofData.publishedAfterDate = LowerRenditionOfYearRange;
        }
        return JSONofData;
    }


    function retrieveDatafromGUIoutputURL() {
        /**
         * A function that was used in the version 1 of the tool
         * It prepares a long URL query string to be send to the server logic (APIHandler.php)
         * It cleans and construct the data.
         * giving the API a query URL turns out to limit customization of metadata fields such as
         * searching between two date of publications etc...
         * This function helps in sending a GET request on the server side with search parameters
         *
         * This function is not used anymore & kept for archival purpose
         * **/

        var inclusionTextAreaContent = $('#inclusionlistTextArea').val();
        var query = $('#query').val();
        var MetadataFields = $('#MetadataFieldsTextArea').val();
        var size = $('#size').val();
        var offset = $('#offset').val();
        var page = $('#page').val();
        var pageSize = $('#pageSize').val();


        var URLFormed;
        if (!(typeof query === 'undefined' || query === null || query == "")) {
            URLFormed = baseURL + "q=" + encodeURIComponent(query);
        } else if (!(typeof inclusionTextAreaContent === 'undefined' || inclusionTextAreaContent === null || inclusionTextAreaContent == "")) {
            inclusionTextAreaContent = inclusionTextAreaContent.replace(/\n/g, " OR ");
            URLFormed = baseURL + "q=" + encodeURIComponent(inclusionTextAreaContent);
        }
        //retrieving from size textbox
        if (!(typeof size === 'undefined' || size === null || size == "")) {
            console.log("size is: " + size);
            URLFormed = URLFormed + "&size=" + size;
        }

        //retrieving from offset textbox
        if (!(typeof offset === 'undefined' || offset === null || offset == "")) {
            console.log("offset is: " + offset);
            URLFormed = URLFormed + "&offset=" + offset;
        }

        //retrieving from page textbox
        if (!(typeof page === 'undefined' || page === null || page == "")) {
            console.log("page is: " + page);
            URLFormed = URLFormed + "&page=" + page;
        }

        //retrieving from pageSize textbox
        if (!(typeof pageSize === 'undefined' || pageSize === null || pageSize == "")) {
            console.log("pageSize is: " + pageSize);
            URLFormed = URLFormed + "&pageSize=" + pageSize;
        }

        //retrieving from fields textarea
        if (!(typeof MetadataFields === 'undefined' || MetadataFields === null || MetadataFields == "")) {
            MetadataFieldsCleaned = MetadataFields.replace(/\n/g, "&fields=");
            console.log("MetadataFieldsCleaned are: ");
            console.log(MetadataFieldsCleaned);
            URLFormed = URLFormed + "&fields=" + MetadataFieldsCleaned;
        }

        return URLFormed;
    }


    $(document).ready(function () {
        /**
         * JQuery function for when the document loads the DOM
         *
         * **/

        $('#ResultsContainerDIV').hide();
        //$('#table-controls').hide();


        //disabling initally buttons unless q textbox has data
        $('#ExecuteQuerybtn').attr('disabled', true);
        $('#ProgressCircleGIF').hide();


        $('.necessary').keyup(function () {
            if ($(this).val().length != 0) {
                $('#ExecuteQuerybtn').attr('disabled', false);

            } else {
                $('#ExecuteQuerybtn').attr('disabled', true);

            }

        });


        $('#ExecuteQuerybtn').click(function () {

            //Show Progress bar GIF
            $('#ProgressCircleGIF').show();
            //On button click it send data to the APIHandler.php
            JSONtoSend = retrieveDatafromGUIoutputJSObj();
			
            //Global variable for number of results
            var NbofResults;

            $.ajax({
                type: "POST",
                url: "APIHandler.php",
                data: {
                    JSON: JSONtoSend
                },
                dataType: 'text',
                success: function (response) {
                    //echo what the server sent back...
                    var ResultstextArea = document.getElementById("txt1");
                    ResultstextArea.value = response;

                    //Now send another AJAX for HTML rendering purposes
                    var radioBtnResultsofCustomizationselected = $('input[name=resultscustomization]:checked').val();
                    //console.log("Radio Btn of Results customization selected: " + radioBtnResultsofCustomizationselected);

                    if (radioBtnResultsofCustomizationselected == "First10") {
                        //A quick and dirty fix to change the JSONtoSend only for when user
                        //chooses First10
                        JSONtoSend.size = 10;
                    } else if (radioBtnResultsofCustomizationselected == "AllAvailable") {
                        JSONtoSend.size = getHowManyResultsforSearch(JSONtoSend);
                        //console.log("*** is " + JSONtoSend.size);
                    }

                    $.ajax({
                        type: "POST",
                        url: "APIHandler.php",
                        data: {
                            JSON: JSONtoSend
                        },
                        dataType: 'text',
                        success: function (render_response) {
                            //echo what the server sent back...
                            var ParsedJSON = JSON.parse(render_response);
                            $('#ResultsContainerDIV').show();

                            //console.log(ParsedJSON);

                            if ($("#download-csv").length || $("#download-json").length || $("#download-xlsx").length) {
                                $("#download-csv").remove();
                                $("#download-json").remove();
                                $("#download-xlsx").remove();
                                $("#ResultsTableDIV").empty();
                            }

                            var table = new Tabulator("#ResultsTableDIV", {
                                height: "311px",
                                //layout:"fitColumns",
                                layout: "fitData",
                                layoutColumnsOnNewData: true,
                                pagination: "local",
                                paginationSize: 10,
                                paginationSizeSelector: [10, 20, 30, 50, 100],
                                movableColumns: true,
                                //autoColumns:true,
                                selectable: true,
                                clipboard: true,
                                clipboardPasteAction: "replace",
                                data: ParsedJSON['items'],
                                columns: [
                                    {
                                        title: "Title",
                                        field: "title",
                                        width: 200,
                                        sortable: true,
                                        frozen: true,
                                        headerFilter: true
                                    },
                                    {title: "Type", field: "type.0.value", sortable: true, headerFilter: true},
                                    {
                                        title: "Author1 First Name",
                                        field: "personAssociations.0.name.firstName",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Author1 Last Name",
                                        field: "personAssociations.0.name.lastName",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Author2 First Name",
                                        field: "personAssociations.1.name.firstName",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Author2 Last Name",
                                        field: "personAssociations.1.name.lastName",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Journal Name",
                                        field: "journalAssociation.journal.name.0.value",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Managing Organisational Name",
                                        field: "managingOrganisationalUnit.name.0.value",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    // {
                                    //     title: "Managing Organisational ID",
                                    //     field: "managingOrganisationalUnit.externalId",
                                    //     sortable: true,
                                    //     headerFilter:true
                                    // },
                                    {
                                        title: "Organisational Unit1",
                                        field: "organisationalUnits.1.name.0.value",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Organisational Unit2",
                                        field: "organisationalUnits.2.name.0.value",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Publication Year",
                                        field: "publicationStatuses.0.publicationDate.year",
                                        align: "center",
                                        headerFilter: true,
                                        sortable: true,
                                        sorter: "date"
                                    },
                                    {
                                        title: "Publisher Name",
                                        field: "publisher.name.0.value",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                    {
                                        title: "Username",
                                        field: "info.createdBy",
                                        align: "center",
                                        sortable: true,
                                        headerFilter: true
                                    },
                                ],

                            });


                            $("#ResultsTableDIV").after("<br><button type='button' id='download-csv' class='btn btn-primary'>Download Preview Table Results to CSV</button>");
                            $("#download-csv").after("&nbsp;&nbsp;<button type='button' id='download-json' class='btn btn-primary'>Download Preview Table Results to JSON</button>");
                            $("#download-json").after("&nbsp;&nbsp;<button type='button' id='download-xlsx' class='btn btn-primary'>Download Preview Table Results to Excel</button>");


                            $("#download-csv").click(function () {
                                table.download("csv", "data.csv");
                            });

                            $("#download-json").click(function () {
                                table.download("json", "data.json");
                            });

                            $("#download-xlsx").click(function () {
                                table.download("xlsx", "data.xlsx", {sheetName: "My Data"});
                            });


                            $('#ProgressCircleGIF').hide();
                        }
                    });

                }
            });

        });


        var radioBtnselected = $('input[name=searchMethod]:checked').val();
        //console.log("Radio Btn selected: " + radioBtnselected);
        $('#InclusionListDIV').show();
        $('#FreeQuerySearchDIV').hide();

        $(function () {
            $('#RadioBtns input[type=radio]').change(function () {
                //alert ( $(this).val() )

                if ($(this).val() == 'InclusionListRadio') {
                    $('#InclusionListDIV').show();
                    $('#FreeQuerySearchDIV').hide();
                } else {
                    $('#InclusionListDIV').hide();
                    $('#FreeQuerySearchDIV').show();
                }

            });
        });


        //disabling initially all Nb of results custom textboxes
        $("#CustomNbofResultsTextBoxes").hide();
        var radioBtnResultsCustomizationselected = $('input[name=resultscustomization]:checked').val();
        //console.log("Radio Btn of Results customization selected: " + radioBtnResultsCustomizationselected);

        $(function () {
            $('#RadioNbResultsBtns input[type=radio]').change(function () {
                //alert ( $(this).val() )

                if ($(this).val() == 'AllAvailable') {
                    $("#CustomNbofResultsTextBoxes").hide();
                }

                if ($(this).val() == 'First10') {
                    $("#CustomNbofResultsTextBoxes").hide();
                    //Remember JSONtoSend is a global JS object that represent what
                    //to be send to the server for POST API request
                    //JSONtoSend.size = 10;
                }

                if ($(this).val() == 'Custom') {
                    $("#CustomNbofResultsTextBoxes").show();
                }

            });
        });


        // $('#PublicationYearLowerBoundDatePicker').yearpicker({
        //     year: 1980,
        //
        // });

        // $('#PublicationYearUpperBoundDatePicker').yearpicker({
        //     year: 2019,
        // });

        //by default advanced customisation of metadata fields is hidden
        $('#CustomAdvancedMetadataFieldsDIV').hide();

        //by default the fixed is shown, the range is hidden
        $("#YearOfPublicationFixed").hide();
        $("#YearOfPublicationRange").hide();

        //by default JSONDIV is hidden
        $('#JSONDIV').hide();


        $(function () {
            $('#RadioBtnsPublicationYearCustomizations input[type=radio]').change(function () {
                //alert ( $(this).val() )

                if ($(this).val() == 'AnyYear') {
                    $("#YearOfPublicationFixed").hide();
                    $("#YearOfPublicationRange").hide();


                }

                if ($(this).val() == 'RangeYear') {
                    $("#YearOfPublicationFixed").hide();
                    $("#YearOfPublicationRange").show();
                    //console.log("All Available logic goes here");
                }

                if ($(this).val() == 'FixedYear') {
                    $("#YearOfPublicationFixed").show();
                    $("#YearOfPublicationRange").hide();
                }


            });
        });


        // As other browsers already fire the change event,
        // only bind the listener for IE.
        if (window.navigator.userAgent.indexOf('Trident') >= 0) {

            $(function () {

                // Pointer events in IE10, IE11 can be handled as mousedown.
                $(document).on('mousedown', 'input', function () {

                    // Only fire the change event if the input is indeterminate.
                    if (this.indeterminate) {
                        $(this).trigger('change');
                    }
                });
            });
        }

        //by defaults all checkboxes are hidden except all
        $('#CustomCheckboxesDIV').hide();

        checkbox = document.getElementById('AllMetadataCheckbox');

        checkbox.addEventListener('change', e => {

            if (e.target.checked) {
                console.log($(this).val() + ' is now checked');
                $('#CustomCheckboxesDIV').hide();
            } else {
                console.log($(this).val() + ' is now unchecked');
                $('#CustomCheckboxesDIV').show();
            }

        });

        //The following commented code work on all browsers except (of course!) MS IE/Edge
        //So I had to change it to Vanilla JS

        // $('#myform :checkbox').change(function () {
        //     if ($(this).is(':checked')) {
        //         console.log($(this).val() + ' is now checked');
        //         $('#CustomCheckboxesDIV').hide();
        //     } else {
        //         console.log($(this).val() + ' is now unchecked');
        //         $('#CustomCheckboxesDIV').show();
        //     }
        // });
        // var _selector = document.querySelector('input[id=AllMetadataCheckbox]');
        // _selector.addEventListener('change', function (event) {
        //     if (_selector.checked) {
        //
        //     } else {
        //
        //     }
        // });
        // $("#AllMetadataCheckbox").change(function () {
        //     if (this.checked) {
        //
        //         $('#CustomCheckboxesDIV').hide();
        //     }
        //
        //     if (this.checked == false) {
        //
        //         $('#CustomCheckboxesDIV').show();
        //     }
        // });


    });

</script>

</body>
</html>