<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>School Form 5 (SF5)</title>  
  </head>
  <body>
    <style>
      p {
        margin-bottom: 0;
        font-size: 10px;
      }
      td {
        padding-block: 0 !important;
      }
      tr {
        height: 20px !important;
      }
      th {
        padding: 0;
        font-size: 10px;
        line-height: 1;
        margin: 0;
        vertical-align: middle;
        text-align: center;
      }
      @media print {
        @page {
          size: Legal;
          margin: 0;
        }
        body {
          margin: 0;
          padding: 0;
        }
      }
    </style>

    <!-- Page 1 -->
    <div class="d-flex flex-column border" style="width: 8.5in; height: 14in">
      <div class="col-12 d-flex flex-column gap-1 h-100 p-2">
        <!-- Title -->
        <div class="position-relative text-center">
          <img
            src="image1.png"
            alt="logo1"
            class="position-absolute top-0 start-0"
            style="height: 60px; aspect-ratio: 1"
          />
          <img
            src="image2.gif"
            alt="logo1"
            class="position-absolute top-0 end-0"
            style="height: 60px"
          />
          <p>Republic of the Philippines</p>
          <p>Department of Education</p>
          <h2 class="fs-6 mb-0">
            Learner Permanent Record for Elementary School (SFIO-ES)
          </h2>
          <p style="font-size: 10px; font-style: italic">(Formerly Form 137)</p>
        </div>

        <!-- Learner Personal Information -->
        <div class="">
          <p class="text-center fw-bold" style="background-color: lightgray">
            LEARNER PERSONAL INFORMATION
          </p>
          <div class="d-flex">
            <p class="d-flex col-3">
              LAST NAME:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-4">
              FIRST NAME:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-2">
              NAME EXTN. (Jr,I,II):<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-3">
              MIDDLE NAME:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
          </div>
          <div class="d-flex">
            <p class="d-flex col-4">
              Learner Reference Number (LRN):<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-4">
              Birthdate(mm/dd/yyyy):<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-4">
              Sex:<span class="flex-grow-1 border-bottom border-black"></span>
            </p>
          </div>
        </div>

        <!-- Elligibilty -->
        <div class="">
          <p class="text-center fw-bold" style="background-color: lightgray">
            ELIGIBILITY FOR ELEMENTARY SCHOOL ENROLMENT
          </p>
          <div class="d-flex justify-content-between">
            <p class="d-flex col-3">Credential Presented for Grade 1:</p>
            <label class="d-flex gap-1">
              <input type="checkbox" />
              <p>Kinder Progress Report</p>
            </label>
            <label class="d-flex gap-1">
              <input type="checkbox" />
              <p>ECCD Checklist</p>
            </label>
            <label class="d-flex gap-1">
              <input type="checkbox" />
              <p>Kindergarten Certificate of Completion</p>
            </label>
          </div>
          <div class="d-flex">
            <p class="d-flex col-5">
              Name of School:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-2">
              School ID:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-5">
              Address of School:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
          </div>
        </div>

        <!-- Other -->
        <div class="">
          <p class="">Other Credential Presented</p>
          <div class="d-flex justify-content-between">
            <label class="d-flex gap-1 col-3">
              <input type="checkbox" />
              <p class="d-flex gap-1 flex-grow-1">
                PEPT Passer Rating:<span
                  class="flex-grow-1 border-bottom border-black"
                ></span>
              </p>
            </label>
            <p class="d-flex col-6">
              Date of Examination/Assessment (mm/dd/yyy):<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <label class="d-flex gap-1 col-3">
              <input type="checkbox" />
              <p class="d-flex gap-1 flex-grow-1">
                Others (Pls. Specify):<span
                  class="flex-grow-1 border-bottom border-black"
                ></span>
              </p>
            </label>
          </div>
          <div class="d-flex">
            <p class="d-flex col-8">
              Name and Address of Testing Center:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
            <p class="d-flex col-4">
              Remark:<span
                class="flex-grow-1 border-bottom border-black"
              ></span>
            </p>
          </div>
        </div>
        <p class="text-center fw-bold" style="background-color: lightgray">
          SCHOLASTIC RECORD
        </p>
        <div class="d-flex flex-column gap-2">
          <div class="d-flex gap-2">
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex gap-2">
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page 2 -->
    <div class="d-flex flex-column border" style="width: 8.5in; height: 14in">
      <div class="col-12 d-flex flex-column gap-1 h-100 p-2">
        <p class="text-center fw-bold" style="background-color: lightgray">
          SCHOLASTIC RECORD
        </p>
        <div class="d-flex flex-column gap-2">
          <div class="d-flex gap-2">
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="d-flex gap-2">
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- scholastic block -->
            <div class="w-50 h-100 d-flex gap-1 flex-column">
              <div class="border border-black p-1">
                <div class="d-flex col-12">
                  <p class="col-8 d-flex">
                    School:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School ID:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    District:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Division:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Region:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Classified as Grade:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Section:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    School Year:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
                <div class="d-flex">
                  <p class="flex-grow-1 d-flex">
                    Name of Adviser/Teacher:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                  <p class="flex-grow-1 d-flex">
                    Signature:<span
                      class="border-bottom border-black flex-grow-1"
                    ></span>
                  </p>
                </div>
              </div>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead class="">
                  <tr>
                    <th rowspan="2" class="">LEARNING AREAS</th>
                    <th colspan="4" class="">Quarterly Rating</th>
                    <th rowspan="2" class="">Final Rating</th>
                    <th rowspan="2" class="">Remarks</th>
                  </tr>
                  <tr>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Mother Tongue</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Filipino</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>English</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Mathematics</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Science</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Araling Panlipunan</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>EPP/TLE</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>MAPEH</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Music</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Arts</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Physical Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">Health</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>Edukasyon sa Pagpapakatao</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Arabic Language</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td class="ps-2 fst-italic">*Islamic Values Education</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td><strong>General Average</strong></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              <table
                class="table table-sm table-bordered border border-black mb-0"
                style="font-size: 10px"
              >
                <thead>
                  <tr class="col-12">
                    <th class="col-4">Remedial Classes</th>
                    <th colspan="4" class="col-8">
                      <div class="d-flex flex-row col-12">
                        <p class="d-flex col-8">
                          Conducted from:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                        <p class="d-flex col-4">
                          To:<span
                            class="border-bottom border-black flex-grow-1"
                          ></span>
                        </p>
                      </div>
                    </th>
                  </tr>

                  <tr>
                    <th>Learning Areas</th>
                    <th>Final Rating</th>
                    <th>Remedial Mark</th>
                    <th>Recomputed Final Grade</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Page 3 -->
    <div class="d-flex flex-column border" style="width: 8.5in; height: 14in">
      <div class="col-12 d-flex flex-column gap-1 h-100 p-2">
        <div class="d-flex flex-column gap-2">
          <p class="fw-bold">
            For Transfer Out /Elementary School Completer Only
          </p>
          <div
            class="d-flex align-items-center flex-column border border-black"
          >
            <p
              style="background-color: lightgray"
              class="w-100 text-center fw-bold"
            >
              CERTIFICATION
            </p>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-6">
                I CERTIFY that this is a true record of
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-2">
                with LRN
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                and that he/she is eligible for admission to Grade
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-4">
                School Name<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                School ID<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                Division
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                Last School Attended
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div
              class="justify-content-around d-flex gap-5 mt-4"
              style="width: 90%"
            >
              <div class="text-center" style="width: 150px">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Date</p>
              </div>
              <div class="text-center">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Signature of Principal/School Head over Printed Name</p>
              </div>
              <div class="text-center">
                <p>&nbsp;</p>
                <p>(Affix School Seal here)</p>
              </div>
            </div>
          </div>
          <div
            class="d-flex align-items-center flex-column border border-black"
          >
            <p
              style="background-color: lightgray"
              class="w-100 text-center fw-bold"
            >
              CERTIFICATION
            </p>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-6">
                I CERTIFY that this is a true record of
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-2">
                with LRN
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                and that he/she is eligible for admission to Grade
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-4">
                School Name<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                School ID<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                Division
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                Last School Attended
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div
              class="justify-content-around d-flex gap-5 mt-4"
              style="width: 90%"
            >
              <div class="text-center" style="width: 150px">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Date</p>
              </div>
              <div class="text-center">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Signature of Principal/School Head over Printed Name</p>
              </div>
              <div class="text-center">
                <p>&nbsp;</p>
                <p>(Affix School Seal here)</p>
              </div>
            </div>
          </div>
          <div
            class="d-flex align-items-center flex-column border border-black"
          >
            <p
              style="background-color: lightgray"
              class="w-100 text-center fw-bold"
            >
              CERTIFICATION
            </p>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-6">
                I CERTIFY that this is a true record of
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-2">
                with LRN
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                and that he/she is eligible for admission to Grade
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div class="col-12 d-flex" style="width: 90%">
              <p class="d-flex col-4">
                School Name<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                School ID<span
                  class="border-bottom border-black flex-grow-1"
                ></span>
              </p>
              <p class="d-flex col-2">
                Division
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
              <p class="d-flex col-4">
                Last School Attended
                <span class="border-bottom border-black flex-grow-1"></span>
              </p>
            </div>
            <div
              class="justify-content-around d-flex gap-5 mt-4"
              style="width: 90%"
            >
              <div class="text-center" style="width: 150px">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Date</p>
              </div>
              <div class="text-center">
                <p class="border-black border-bottom">&nbsp;</p>
                <p>Signature of Principal/School Head over Printed Name</p>
              </div>
              <div class="text-center">
                <p>&nbsp;</p>
                <p>(Affix School Seal here)</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
