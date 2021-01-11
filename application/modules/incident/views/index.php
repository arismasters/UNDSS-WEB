<div class="uk-margin-small-top uk-margin-small-left">
    <!-- <div uk-flex> -->
    <div class="uk-flex">
        <div class="uk-width-2-3@l uk-width-1-1@s">
            <div class="uk-flex uk-padding-small">
                <div class="uk-width-1-2">
                    <h3>Incident Type</h3>
                </div>
                
                <div class="uk-width-1-2">
                    <div class="uk-flex uk-flex-right p-10">
                        <div class="uk-background-secondary text-white p-5">
                            <span class="uk-margin-small-right" uk-icon="icon: plus"></span>
                            <span class="uk-margin-small-right" uk-icon="icon: list"></span>
                            <span class="uk-margin-small-right" uk-icon="icon: search"></span>
                        </div>
                    </div>
                </div>            
            </div>

            <div class="uk-padding-small">
                <span>What is Incident type as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ini et dolore magna aliqua ini</span>
            </div>

            <!-- <div class="uk-flex uk-padding-small border-bottom click-add-bg" uk-toggle="target: #incident; cls: uk-hidden"> -->
            <div class="uk-flex uk-padding-small border-bottom click-add-bg">
                <div>
                    <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 2.5"></span>
                </div>
                <div>
                    <div class="uk-flex">
                        <div class="uk-width-1-2">
                            <h2>Thief</h2>
                        </div>
                        <div class="uk-width-1-2 uk-text-right pr-20">
                            <span>2 min ago</span>
                        </div>
                    </div>
                    <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                    <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                </div>
            </div>

            <!-- <div class="uk-flex uk-padding-small border-bottom click-add-bg" uk-toggle="target: #incident; cls: uk-hidden"> -->
            <div class="uk-flex uk-padding-small border-bottom click-add-bg">
                <div>
                    <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 2.5"></span>
                </div>
                <div>
                    <div class="uk-flex">
                        <div class="uk-width-1-2">
                            <h2>Tsunami</h2>
                        </div>
                        <div class="uk-width-1-2 uk-text-right pr-20">
                            <span>2 year ago</span>
                        </div>
                    </div>
                    <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                    <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                </div>
            </div>           
        </div>
        
    </div>
    <!-- end flex -->
    
    <div id="incident" class="uk-width-1-3@l uk-width-1-1@s uk-background-secondary uk-position-right uk-height-viewport text-white">
        <div class="uk-flex">
            <div class="p-5 uk-height-viewport">
                <div class="uk-flex mt-15">
                    <div>
                        <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 1.5"></span>
                    </div>
                    <div>
                        <h3 class="text-white">Thief</h3>
                    </div>
                </div>
                <div>
                    <span>Description</span>
                    <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                    <h3 class="text-white">Incident Type Form</h3>
                    <form action="#" class="uk-form-stacked">
                        <div class="uk-margin">
                            <label class="uk-form-label text-white" for="form-stacked-text">Type</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label class="uk-form-label text-white" for="form-stacked-text">Description</label>
                            <div class="uk-form-controls">
                                <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                            </div>
                        </div>
                        <div class="uk-flex uk-flex-bottom uk-height-medium@l uk-height-small@s">
                            <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="left-line">
                <div class="uk-height-1-1">
                    <div class="">
                        <span uk-icon="icon: close; ratio: 2.5;" uk-toggle="target: #incident"></span>
                    </div>
                    <div class="btn-right-bottom">
                        <span uk-icon="icon: trash; ratio: 2.5;"></span>
                    </div>
                </div>
            </div>
        </div> <!-- end flex -->
    </div>
</div>


<!-- canvas -->
<!-- <div id="offcanvas-incident" uk-offcanvas="flip: true">
    <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <div class="uk-flex">
            <div>
                <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 1.5"></span>
            </div>
            <div>
                <h3>Thief</h3>
            </div>
        </div>
        <div>
            <span>Description</span>
            <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
            <h3>Incident Type Form</h3>
            <form action="#" class="uk-form-stacked">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Type</label>
                    <div class="uk-form-controls">
                        <input class="uk-input" id="form-stacked-text" type="text" placeholder="Some text...">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-text">Description</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
                    </div>
                </div>
                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Submit</button>
            </form>
        </div>
    </div>
</div> -->
<!-- end canvas -->