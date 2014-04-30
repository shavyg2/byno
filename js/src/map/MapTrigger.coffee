class MapTrigger
  constructor:(trigger,map)->
    console.log trigger
    $(trigger).on("mouseover",->
      map.css("background-size","110% 110%")
      map.css("z-index","1")
    )

    $(trigger).on("mouseout",->
      map.css("background-size","100% 100%")
      map.css("z-index","0")
    )
