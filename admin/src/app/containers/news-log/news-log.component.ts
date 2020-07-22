import { Component, OnInit } from '@angular/core';
import { NewsLog } from "../../context/models";
import { select, Store } from "@ngrx/store";
import { newsLogActions, selectNewsLogList } from "../../context/store/news-log";

@Component({
  selector: 'app-news-log',
  templateUrl: './news-log.component.html',
  styleUrls: ['./news-log.component.css']
})
export class NewsLogComponent implements OnInit {

    logs: NewsLog[];

    constructor(private store: Store) {
    }

    ngOnInit(): void {
        this.store.dispatch(newsLogActions.load());
        this.store.pipe(
            select(selectNewsLogList)
        ).subscribe(
            data => this.logs = {...data}
        );
    }

}
