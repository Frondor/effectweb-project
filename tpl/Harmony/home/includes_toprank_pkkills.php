                	<div id="Ranking_PkKills" class="currentRanking">
                    	<if syntax="count($home_module['rankings']['pkKills']) > 0">
                        <if syntax="$this->settings['HOME']['TOP_RANK']['PK_KILLS'][2] == true">
                    	<ul class="topRanks">
                        	<foreach loop="$home_module['rankings']['pkKills'] as $rank">
                        	<li>
                            	<a href="javascript: void(0);" class="rankLink" rel="{$rank['name']}">
                                    <span>{$rank['order']}&ordm; - {$rank['name']}</span>
                                    <img src="{$rank['image']}" alt="{$rank['name']}">
                                </a>
                                <span>( {$rank['result']} {$this->lang->words['Home']['TopRank']['Words']['PkKills']} )</span>
                			</li>
                            </foreach>
                		</ul>
                        <else />
                        <ul class="ranks-classic">
                            <li>
                                <span>{$this->lang->words['Home']['TopRank']['Words']['Position']}</span>
                                <span>{$this->lang->words['Home']['TopRank']['Words']['Name']}</span>
                                <span>{$this->lang->words['Home']['TopRank']['Words']['PkKills']}</span>
                            </li>
                            <foreach loop="$home_module['rankings']['pkKills'] as $rank">
                            <li>
                                <a href="javascript: void(0);" class="rankLink" rel="{$rank['name']}">
                                    <span>{$rank['order']}&ordm;</span>
                                    <span>{$rank['name']}</span>
                                    <span>{$rank['result']}</span>
                                </a>
                            </li>
                            </foreach>
                        </ul>
                        </if>
                        </if>
               		</div>