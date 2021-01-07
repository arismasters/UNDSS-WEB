<div class="">
    <div class="uk-padding-small uk-inline">
        <div uk-grid>
            <div class="uk-width-1-2@l uk-width-1-1@s">
                <div class="uk-flex">
                    <div class="uk-width-1-2">
                        <h3>Threat Category</h3>
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

                <span>What is Incident type as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ini et dolore magna aliqua ini</span>

                <!-- <div class="uk-flex" uk-toggle="target: #scenario; animation: uk-animation-slide-right; cls: uk-invisible"> -->
                <div class="uk-flex scenario">
                    <div>
                        <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 3.5"></span>
                    </div>
                    <div>
                        <div class="uk-flex">
                            <div class="uk-width-1-2">
                                <h2>Armed Conflict</h2>
                            </div>
                            <div class="uk-width-1-2 uk-text-right">
                                <span>2 min ago</span>
                            </div>
                        </div>
                        <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                        <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                    </div>
                </div>
                
                <!-- <div class="uk-flex" uk-toggle="target: #scenario; animation: uk-animation-slide-right; cls: uk-invisible"> -->
                <div class="uk-flex scenario">
                    <div>
                        <span class="uk-margin-small-right" uk-icon="icon: folder; ratio: 3.5"></span>
                    </div>
                    <div>
                        <div class="uk-flex">
                            <div class="uk-width-1-2">
                                <h2>Terrorisme</h2>
                            </div>
                            <div class="uk-width-1-2 uk-text-right">
                                <span>2 year ago</span>
                            </div>
                        </div>
                        <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                        <span>Description of theft as Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</span>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- end grid -->
        
        <!-- detail scenario -->
        <div id="scenario" class="uk-width-1-2@l uk-width-1-1@s uk-background-secondary uk-position-right uk-height-viewport text-white">
            <div class="uk-flex">
                <div class="p-5 uk-height-viewport uk-overflow-auto">
                    <div class="uk-flex mt-15">
                        <div class="uk-width-1-2">
                            <span class="text-white">Armed Conflict</span>
                        </div>
                        <div class="uk-width-1-2 uk-text-right">
                            <span class="" uk-icon="icon: pencil"></span>
                            <span class="" uk-icon="icon: trash"></span>
                        </div>
                    </div>
                    
                    <div class="uk-flex mt-15 text-white">
                        <div class="uk-width-1-2">
                            <span class="">Specific Threat Scenario</span>
                        </div>
                        <div class="uk-width-1-2 uk-flex uk-flex-right">
                            <div class="uk-flex uk-flex-middle">
                                <!-- <button type="button" uk-toggle="target: #form-scenario; animation: uk-animation-slide-right"> -->
                                <button type="button" class="new-scan">
                                    <span class="" uk-icon="icon: plus"></span>
                                    <span>New Scan</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="uk-flex">
                        <div class="uk-margin-small-right">
                            <span uk-icon="icon: folder"></span>
                        </div>
                        <div>
                            <span>Conflict between Armed separatist groups (OPM) and Indonesian security forces</span>
                            <div class="uk-flex uk-flex-middle">
                                <button type="button">
                                    <span class="" uk-icon="icon: pencil"></span>
                                    <span>Edit</span>
                                </button>
                                <span class="uk-margin-small-left" uk-icon="icon: trash"></span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-grey-1 uk-margin-small-top uk-margin-small-bottom uk-padding-small">
                        <ul class="uk-list uk-margin-medium-left">
                            <?php for($i=0;$i<=4;$i++):?>
                                <li>
                                    <div class="uk-clearfix">
                                        <div class="uk-float-left">
                                            <span>Armed attack against TNI or Police personnel</span>
                                            <div class="uk-flex uk-flex-middle">
                                                <button type="button" uk-toggle="target: #form-scenario">
                                                    <span class="" uk-icon="icon: pencil"></span>
                                                    <span>Edit</span>
                                                </button>
                                                <span class="uk-margin-small-left" uk-icon="icon: trash"></span>
                                            </div>
                                        </div>
                                        <div class="uk-float-right">
                                            <span>2 hour ago</span>
                                        </div>
                                    </div>
                                </li>
                            <?php endfor;?>
                        </ul>
                    </div>

                    <div>
                        <div class="uk-clearfix">
                            <div class="uk-float-left">
                                <div class="uk-flex">
                                    <div>
                                        <span class="uk-margin-small-left" uk-icon="icon: trash"></span>
                                    </div>
                                    <div class="uk-margin-small-left">
                                        <span>Assassination/targeted attacks on persons (Lone Wolf attack)</span>
                                        <div class="uk-flex uk-flex-middle">
                                            <button type="button">
                                                <span class="" uk-icon="icon: pencil"></span>
                                                <span>Edit</span>
                                            </button>
                                            <span class="uk-margin-small-left" uk-icon="icon: trash"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-float-right">
                                <span>2 hour ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="left-line">
                    <div class="uk-height-1-1">
                        <div>
                            <span class="close" uk-icon="icon: close"></span>
                            <!-- <span uk-icon="icon: close; ratio: 2.5;" uk-toggle="target: #scenario"></span> -->
                        </div>
                    </div>
                </div>
            </div> <!-- end flex -->
        </div>
        <!-- end detail scenario -->

        <!-- form scenario -->
        <div id="form-scenario" class="uk-width-1-2@l uk-width-1-1@s uk-background-secondary uk-position-right uk-height-viewport text-white">
            <div class="uk-flex">
                <div class="p-5 uk-height-viewport uk-overflow-auto">
                    <div class="uk-flex mt-15 close">
                        <div class="uk-margin-small-right">
                            <span uk-icon="icon: chevron-left"></span>
                        </div>
                        <div>
                            <span class="text-white">Scenario</span>
                        </div>
                    </div>
                        
                    <div class="uk-margin-small-top uk-margin-small-bottom uk-padding-small">
                        <div>
                            <span>Scenario</span>
                        </div>
                        <div>
                            <span>Conflict between Armed separatist groups (OPM) and Indonesian security forces</span>
                        </div>
                        <h3 class="text-white">Scenario form</h3>
                        <form action="#" class="uk-form-stacked">
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
                        <div>
                            <span class="close" uk-icon="icon: close"></span>
                            <!-- <span uk-icon="icon: close; ratio: 2.5" uk-toggle="target: #form-scenario"></span> -->
                        </div>
                    </div>
                </div>
            </div> <!-- end flex -->
        </div>
        <!-- end form scenario -->
    </div>
</div>