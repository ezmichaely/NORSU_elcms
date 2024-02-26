<div class="card-header">
    <div class="d-flex justify-content-between align-items-center flex-row flex-wrap">
        <button id="btnClassQuiz"
            class="btn btn-outline-primary card-header-list active text-uppercase fw-bold text-center">
            QUIZ
        </button>

        <button id="btnClassAssignment"
            class="btn btn-outline-primary  card-header-list text-uppercase fw-bold text-center">
            ASSIGNMENT
        </button>

        <button id="btnClassProject"
            class="btn btn-outline-primary  card-header-list text-uppercase fw-bold text-center">
            PROJECT
        </button>

        <button id="btnClassMajorExam"
            class="btn btn-outline-primary  card-header-list text-uppercase fw-bold text-center">
            MAJOR EXAM
        </button>
    </div>
</div>



<div class="card-body">
    <!-- CLASS QUIZ -->
    <div id="divClassQuiz" class="divClassQuiz data-table overflow-auto mt-3 d-block">
        <table id="ClassQuizTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Quiz #</th>
                    <th>Due Date</th>
                    <th>Time Limit</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- CLASS assignment -->
    <div id="divClassAssignment" class="divClassAssignment data-table overflow-auto mt-3 d-none">
        <table id="ClassAssignmentTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Assignment #</th>
                    <th>Due Date</th>
                    <th>Action</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- CLASS project -->
    <div id="divClassProject" class="divClassProject data-table overflow-auto mt-3 d-none">
        <table id="ClassProjectTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Project #</th>
                    <th>Due Date</th>
                    <th>Action</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- CLASS majorexam -->
    <div id="divClassMajorExam" class="divClassMajorExam data-table overflow-auto mt-3 d-none">
        <table id="ClassMajorExamTable" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Major Exam #</th>
                    <th>Due Date</th>
                    <th>Time Limit</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
