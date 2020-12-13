</div>
	</div>
	<script src="https://unpkg.com/@popperjs/core@2"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/12065bbb1f.js" crossorigin="anonymous"></script>
        <script src="templates/scrollbot-master/scrollbot.js"></script>
        <script src="js/jquery_number.js"></script>
        <script>
            
            $(document).ready(function(){
                        $('[data-toggle="popover"]').popover();  
                function filter_weapon(){//weapon filter, search key filter
                    var a = [];
                    $('.weapon-filter .item .weapon-item.active a.weapon-type').each(function () {
                      a.push( $(this).attr("data-target") );
                    });
                    console.log($('#find-character').val().toLowerCase().trim());
                    $('.character-list .item a.char-direction').filter(function(){
                        $(this).parent().toggle(
                            (a.includes($(this).attr('data-wp')) && $(this).attr('title').toLowerCase().indexOf($('#find-character').val().toLowerCase().trim()) > -1) ||
                            (a.includes($(this).attr('data-wp')) && $(this).attr('data-original-title').toLowerCase().indexOf($('#find-character').val().toLowerCase().trim()) > -1)
                        );
                    });
                }
                        function filter_imagecard(method){
                                $('.inner-content .quickview-info .image-collection .image-items .item').each(function(){
                                        if($(this).attr('data-method').toLowerCase() == method.toLowerCase())
                                                $(this).addClass('current');
                                        else
                                                $(this).removeClass('current');
                                })
                                
                        }
                $('.weapon-filter .item').on('click',function(){
                    $(this).find('.weapon-item').toggleClass('active');
                    filter_weapon();
                })
                $('#find-character').on('keyup',function(){
                    filter_weapon();
                })
                function cal(){
                                var atk = $('#ATK_input').val()>=0?$('#ATK_input').val():0;
                                if($('#crit-rate_input').val()){
                                    if($('#crit-rate_input').val()>=0){
                                        if($('#crit-rate_input').val()<=100){
                                            var crit_rate = $('#crit-rate_input').val();
                                        }
                                        else
                                            var crit_rate = 100;
                                    }
                                    else
                                        var crit_rate = 0;
                                }
                                else
                                        var crit_rate = 0;

                                var crit_dmg = $('#crit-DMG_input').val()>=0?$('#crit-DMG_input').val():0;
                                var ele_sk_buff = $('#ele-sk-buff_input').val()>=0?$('#ele-sk-buff_input').val():0;
                                var normal_atk_buff = $('#normal_atk_buff_input').val()>=0?$('#normal_atk_buff_input').val():0;
                                var physic_buff = $('#physic-buff_input').val()>=0?$('#physic-buff_input').val():0;
                                var maxHP = $('#maxHP_input').val()>=0?$('#maxHP_input').val():0;
                                var DEF = $('#DEF_input_input').val()>=0?$('#DEF_input_input').val():0;
                                var output_physic = parseInt((atk * normal_atk_buff/100) * (1 + physic_buff/100));
                                var output_physic_crit = output_physic * (1 + parseInt(crit_dmg)/100);
                                $('p.DMG-output[data-target="physic"]').html($.number(output_physic)+' / '+$.number(output_physic_crit));

                                var output_element = parseInt((atk * normal_atk_buff/100) * (1 + ele_sk_buff /100));
                                var output_element_crit = output_element * (1 + parseInt(crit_dmg)/100);
                                $('p.DMG-output[data-target="element"]').html($.number(output_element)+' / '+$.number(output_element_crit));

                                var overall_physic_dmg = (parseInt(crit_rate) * output_physic_crit + parseInt(100 - crit_rate) * output_physic)/100;
                                $('p.DMG-output[data-target="physic_overall"]').html($.number(parseInt(overall_physic_dmg)));

                                var overall_element_dmg = (parseInt(crit_rate) * output_element_crit + parseInt(100 - crit_rate) * output_element)/100;
                                $('p.DMG-output[data-target="element_overall"]').html($.number(parseInt(overall_element_dmg)));
                        }
                        $('.image-collection .image-type .item').on('click',function(){
                                $('.image-collection .image-type .item').removeClass('current');
                                $(this).addClass('current');
                                filter_imagecard($(this).attr('data-target'));
                        })
                        $('.damage-calculator input').on('keyup change',function(){
                            cal();
                        })
            })

            //sendcontent
        </script>
</body>
</html>