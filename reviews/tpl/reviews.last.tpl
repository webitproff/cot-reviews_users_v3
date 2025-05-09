<!-- BEGIN: MAIN -->
<div class="card mb-5">
  <div class="card-header card-header bg-success-subtle text-success-emphasis">
    <h2 class="h5 mb-0">{PHP.L.reviews_last_index}</h2>
  </div>
  <div class="card-body">
    <!-- BEGIN: REVIEW_ROW -->
    <div class="row g-3 mb-3">
      <div class="col-12 col-md-2 text-center">
        <!-- IF {PHP|cot_module_active('files')} AND !{PHP|cot_plugin_active('userimages')} -->
        <!-- IF {REVIEW_ROW_OWNER_AVATAR_ID} > 0 -->
        <img class="rounded img-fluid" src="{REVIEW_ROW_OWNER_AVATAR_URL}" width="75" height="75" alt="{REVIEW_ROW_OWNER_NICKNAME}">
        <!-- ELSE -->
        <img class="rounded img-fluid" width="75" height="75" alt="{REVIEW_ROW_OWNER_NICKNAME}" src="{PHP.cfg.themes_dir}/{PHP.cfg.defaulttheme}/img/user-noavatar.webp">
        <!-- ENDIF -->
        <!-- ENDIF -->
      </div>
      <div class="col-12 col-md-10">
        <div class="float-end score fw-bold">{REVIEW_ROW_SCORE}</div>
        <div class="owner fw-bold">
          <a class="text-reset" href="{REVIEW_ROW_OWNER_DETAILS_URL}">{REVIEW_ROW_OWNER_FULL_NAME}</a> → {REVIEW_ROW_TO_NAME}
        </div>
        <div class="review-stars">{REVIEW_ROW_STARS}</div>
      </div>
    </div>
    <!-- IF {REVIEW_ROW_AREA} == 'projects' -->
    <p class="text-muted fs-6">{PHP.L.reviews_reviewforproject}: <a href="{REVIEW_ROW_PRJ_URL}">{REVIEW_ROW_PRJ_SHORTTITLE}</a>
    </p>
    <!-- ENDIF -->
    <h6 class="mt-1 fw-bold text-success">{REVIEW_ROW_TITLE}</h6>
    <p class="mb-0 fs-6">{REVIEW_ROW_TEXT|mb_substr($this, 0, 90, 'UTF-8')} ...</p>
    <p class="text-muted fs-6">{REVIEW_ROW_DATE|date('d.m.Y H:i', $this)}</p>
    <!-- END: REVIEW_ROW -->
  </div>
</div>
<!-- END: MAIN -->